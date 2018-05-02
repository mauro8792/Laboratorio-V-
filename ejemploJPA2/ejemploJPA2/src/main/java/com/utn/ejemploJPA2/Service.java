package com.utn.ejemploJPA2;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
public class Service {


    @RequestMapping("/{a}")
    @ResponseBody
    String home(@PathVariable("a") String a) {
        return "Hello World! " + a;
    }
}
