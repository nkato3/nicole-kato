import numpy
import json 
import urlparse

# Standard atmosphere 1976
# outputs a list [pressure, temperature]
# check to see if input altitude is less than 1 and if so set it to 1 to prevent crash
def std_atmos(alt_ft):
    
    if alt_ft<1:
        alt_ft = 1
    #convert to km
    alt_km = alt_ft*.0003048
    #calculate geopotential altitude
    alt_geop = 6378.1*alt_km/(6378.1-alt_km)
    altitudes = [0,11,20,32,47,51,71]
    temperatures = [288.15,216.65,216.65,228.65,270.65,270.65,214.65]
    tgrad = [-6.5,0,1,2.8,0,-2.8,-2]
    pressures = [101325,22620.4781,5469.433701,866.608436,110.648321,66.77164569,3.942725117]
    base = 0
    listout = {}
    for i in altitudes:
        if i<=alt_km:
            base = altitudes.index(i)
    temp_out = temperatures[base]+tgrad[base]*(alt_geop-altitudes[base])
    if tgrad[base]==0:
        pres_out = pressures[base]*numpy.exp(-9.81*28.9644*(alt_geop-altitudes[base])/8.31432/temperatures[base])
    else:
        pres_out = pressures[base]*(temp_out/temperatures[base])**(-9.81*28.9644/8.31432/tgrad[base])
    listout['s_press'] = pres_out
    listout['s_temp'] = temp_out
    return listout
    

def application(environ, start_response):
    status = '200 OK'	

    query = urlparse.parse_qs(environ['QUERY_STRING'])
    get_alt = query.get('alt',[])
    alt = get_alt[0]
    output = std_atmos(int(alt))
    response_headers = [('Content-type', 'application/json'),('Access-Control-Allow-Origin','<origin> | *'),('charset','UTF-8')]
    start_response(status, response_headers)
   
    return json.dumps(output)
