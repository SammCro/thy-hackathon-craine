package com.betterCallGazi.craine.Models;

import lombok.Data;

import javax.persistence.*;
import java.util.List;

@Table(name = "cargos")
@Entity
@Data
public class Cargo {
    //define fields
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private Long id;

    @Column(name = "cargo_id")
    private Long cargoId;

    @Column(name = "user")
    private String user;

    @Column(name = "size")
    private String size;

    @Column(name = "weight")
    private Float weight;

    @Column(name = "segmentation")
    private String segmentation;

    @Column(name = "departure")
    private String departure;

    @Column(name = "landing")
    private String landing;

}
