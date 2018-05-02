package com.utn.Tp4Monitores;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Component;

import java.util.ArrayList;
import java.util.List;

@Component
public interface UsuarioRepos extends JpaRepository<Usuario,Long> {

    @Query("Select Count(nameBrowser) as Cantidad, nameBrowser from Usuario group by (nameBrowser) order by Cantidad  Desc ")
    List<?> getMostUsed();

    @Query("Select nameSo, Count(nameSo) as Cantidad, nameBrowser from Usuario group by (nameSo) order by Cantidad  Desc ")
    List<?> getMostUsedSo();

    @Query("Select nameSo,nameBrowser, Count(id) as Cantidad from Usuario group by nameBrowser,nameSo order by Cantidad  Desc ")
    List<?> getMostUsedSoAndBrowser();


}
