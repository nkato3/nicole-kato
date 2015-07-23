import numpy
import json 
import urlparse

def std_atmos(alt_ft):
# Standard atmosphere 1976
# outputs a list [pressure, temperature]
# check to see if input altitude is less than 1 and if so set it to 1 to prevent crash
   
    if alt_ft<1:
        alt_ft =1
        # convert to km 
    alt_km = alt_ft*.0003048
    #calculate geopotential altitude
    alt_geop = 6378.1*alt_km/(6378.1-alt_km)
    altitudes = [0,11,20,32,47,51,71]
    temperatures = [288.15,216.65,216.65,228.65,270.65,270.65,214.65]
    tgrad = [-6.5,0,1,2.8,0,-2.8,-2]
    pressures = [101325,22620.4781,5469.433701,866.608436,110.648321,66.77164569,3.942725117]
    base = 0   
    for i in altitudes:
        if i<=alt_km:
            base = altitudes.index(i)
    temp_out = temperatures[base]+tgrad[base]*(alt_geop-altitudes[base])
    if tgrad[base]==0:
        pres_out = pressures[base]*numpy.exp(-9.81*28.9644*(alt_geop-altitudes[base])/8.31432/temperatures[base])
    else:
        pres_out = pressures[base]*(temp_out/temperatures[base])**(-9.81*28.9644/8.31432/tgrad[base])
    listout = {'s_press':pres_out,'s_temp':temp_out}
    return listout

# Standard atmosphere 1976
# outputs a list [pressure, temperature]
# check to see if input altitude is less than 1 and if so set it to 1 to prevent crash
# http://nicolekato.com/wsgi-scripts/airspeed?speed=100&speed_type=MACH&alt=100&deltatk=0
def Airspeed2(speed, speed_type,altitude,deltatk):
    #Airspeed conversion function between 'mach', 'kcas'(kts),'ktas'(kts)
    #Define Sea Level constants
    a0 = 1116.45#ft/s
    p0 = 2116.2#psf
    atmos_out = std_atmos(altitude)
    a = numpy.sqrt((1.4*8.3145*(atmos_out['s_temp']+deltatk)/.0289645))*3.280839895#ft/s
    p = atmos_out['s_press']*0.020885434273#psf
    tol =.0001#convergence tolerance
    if speed_type.upper()=='KTAS':
        #convert ktas to mach and switch speed_type to mach
        speed = (speed*6076.12/3600)/a
        speed_type = 'MACH'
    #define output dict
    listout = {}
    if speed_type.upper()=='MACH':
        #speed type of mach or ktas selected
        listout['MACH']=speed
        mach = speed
        vtas = speed*a#ft/s
        listout['KTAS'] = vtas*3600/6076.12
        if mach>=1:
            #supersonic
            #calculate desired impact pressure using mach
            qc = (166.921*mach**7/(7*mach**2-1)**2.5-1)*p
            #define initial vcas guess            
            vcas = 400#ft/s
            #calculate initial guess for qc using vcas then iterate and 
            #converge on a vcas that provides a qc that matches the mach qc
            if vcas>=a0:
                qc_test = p0*(166.921*(vcas/a0)**7/(7*(vcas/a0)**2-1)**2.5-1)
            else:
                qc_test = p0*((1+.2*(vcas/a0)**2)**3.5-1)
            delta = qc-qc_test
            mfactor = mach*9
            #converge on vcas
            while numpy.abs(delta)>tol:
                vcas = vcas+delta/mfactor
                if vcas>=a0:
                    qc_test = p0*(166.921*(vcas/a0)**7/(7*(vcas/a0)**2-1)**2.5-1)
                else:
                    qc_test = p0*((1+.2*(vcas/a0)**2)**3.5-1)
                delta = qc-qc_test
        else:
            #subsonic
            qc = ((1+0.2*mach**2)**3.5-1)*p
            vcas = numpy.sqrt(5*a0**2*((qc/p0+1)**(2/7)-1))#ft/s
            
        #define output kcas
        listout['KCAS'] = vcas*3600/6076.12
    elif speed_type.upper()=='KCAS':
        #speed_type of kcas selected
        listout['KCAS'] = speed
        vcas = (speed*6076.12/3600)#ft/s
        if vcas<a0:
            #subsonic
            #calculate desired qc using vcas
            qc = p0*((1+.2*(vcas/a0)**2)**3.5-1)
            #calculate first estimate for mach
            mach = numpy.sqrt(5*((qc/p+1)**(2/7)-1))
            #calculate intial qc guess 
            if mach>=1:
                qc_test = (166.921*mach**7/(7*mach**2-1)**2.5-1)*p
            else:
                qc_test = ((1+0.2*mach**2)**3.5-1)*p
            delta = qc-qc_test
            kfactor = vcas*9
            #converge on mach that gives desired qc
            while numpy.abs(delta)>tol:
                mach = mach+delta/kfactor
                if mach>=1:
                    qc_test = (166.921*mach**7/(7*mach**2-1)**2.5-1)*p
                else:
                    qc_test = ((1+0.2*mach**2)**3.5-1)*p
                delta = qc-qc_test
        else:
            #supersonic
            #calculate desired qc using vcas(known)
            qc = p0*(166.921*(vcas/a0)**7/(7*(vcas/a0)**2-1)**2.5-1)
            #initial guess for mach(unknown)
            mach = 1
            #calculate initial qc from mach guess
            qc_test = (166.921*mach**7/(7*mach**2-1)**2.5-1)*p
            delta = qc-qc_test
            kfactor = vcas*50
            while numpy.abs(delta)>tol:
                mach = mach+delta/kfactor
                qc_test = (166.921*mach**7/(7*mach**2-1)**2.5-1)*p
                delta = qc-qc_test
        listout['MACH'] = mach
        listout['KTAS'] = mach*a*3600/6076.12
    return listout

def application(environ, start_response):
    status = '200 OK'	

    query = urlparse.parse_qs(environ['QUERY_STRING'])
    get_speed = query.get('speed',[])
    speed = get_speed[0]

    get_speed_type = query.get('speed_type',[])
    speed_type = get_speed_type[0]

    get_alt = query.get('alt',[])
    alt = get_alt[0]

    get_deltatk = query.get('deltatk',[])
    deltatk = get_deltatk[0]

    #def Airspeed2(speed, speed_type,altitude,deltatk):
    output = Airspeed2(float(speed), str(speed_type), int(alt), float(deltatk))
    response_headers = [('Content-type', 'application/json'),('Access-Control-Allow-Origin','<origin> | *'),('charset','UTF-8')]
    start_response(status, response_headers)
   
    return json.dumps(output)
