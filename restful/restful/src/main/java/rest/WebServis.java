/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package rest;

import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.Consumes;
import javax.ws.rs.HeaderParam;
import javax.ws.rs.PathParam;
import net.sourceforge.jFuzzyLogic.FIS;
/**
 *
 * @author Dell
 */
@Path("webservis")
public class WebServis {
    @POST
    @Path("/GetResult/{boy}/{kilo}")
    @Produces(MediaType.APPLICATION_JSON)
    
    public Poco GetValues(@PathParam("boy") double boy,@PathParam("kilo") int kilo)
    {
        
       
        FIS file=FIS.load("C:\\bitirme\\restful\\restful\\src\\main\\java\\rest\\fuzzylogic.fcl",true);
        file.setVariable("boy",boy);
        file.setVariable("kilo",kilo); 
        file.evaluate();
        Poco model=new Poco();
        if(file.getVariable("kitleindexi").getValue()<=19)
        model.setDurum("Zayıf");
        if(file.getVariable("kitleindexi").getValue()>=20&&file.getVariable("kitleindexi").getValue()<=25)
        model.setDurum("Normal");
        if(file.getVariable("kitleindexi").getValue()>=26&&file.getVariable("kitleindexi").getValue()<=30)
        model.setDurum("Hafif Kilolu");
        if(file.getVariable("kitleindexi").getValue()>30)
        model.setDurum("Obez");
        model.setKitleIndex(file.getVariable("kitleindexi").getValue());
        return model;
   //return boy;
    }
}
