# -*- coding: utf-8 -*-
"""
Aero modules
"""

import numpy

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