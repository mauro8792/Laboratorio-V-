package com.utn.Tp4Monitores;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;

@Getter
@Setter
@Entity
public class Usuario {
    @Id
    @GeneratedValue
    private Long id;
    private String nameBrowser;
    private String nameSo;


}
