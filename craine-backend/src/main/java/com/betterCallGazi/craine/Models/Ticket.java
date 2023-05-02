package com.betterCallGazi.craine.Models;

import lombok.Data;

import javax.persistence.*;
import java.util.ArrayList;
import java.util.List;


@Entity
@Table(name = "tickets")
@Data
public class Ticket {
    //define fields
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private Long id;

    @Column(name = "ticket_id")
    private Long ticketId;

    @Column(name = "user")
    private String user;

    @Column(name = "ticket_color")
    private String ticketColor;

    @Column(name = "departure")
    private String departure;

    @Column(name = "landing")
    private String landing;

    @Column(name = "departure_time")
    private String departureTime;

    @Column(name = "landing_time")
    private String landingTime;

    @Column(name = "is_old",columnDefinition = "tinyint(1) default 0")
    private Boolean isOld;

    @Column(name = "check_in_time")
    private Float checkInTime;
}
