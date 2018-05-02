package com.utn.Tp4Monitores;

import eu.bitwalker.useragentutils.UserAgent;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;

@RestController
@RequestMapping("/api")
public class UsuarioControlador {
    @Autowired
    private UsuarioRepos bd;

    @RequestMapping(method = RequestMethod.GET, produces = "application/json")
    public Usuario info(@RequestHeader("User-Agent") String ua){
        UserAgent primero = UserAgent.parseUserAgentString(ua);
        Usuario online= new Usuario();
        online.setNameBrowser(primero.getBrowser().getName());
        online.setNameSo(primero.getOperatingSystem().getName());
        bd.save(online);

        return online;
    }

    @RequestMapping(value = "/usuario/{id}", method = RequestMethod.GET, produces = "application/json")
    public Usuario usuario(@RequestHeader("User-Agent") String ua, @PathVariable("id") Long id){

        Usuario pasado= new Usuario();
        pasado=bd.findById(id).get();
        return pasado;
    }

    @GetMapping("Browser")
    public List<?> browserUsados (){
       return bd.getMostUsed();
    }
    @GetMapping("SistemOperative")
    public List<?> soUsados (){
        return bd.getMostUsedSo();
    }

    @GetMapping("BrowserAndSo")
    public List<?> combinadoSoAndBrowser (){
        return bd.getMostUsedSoAndBrowser();
    }

}
