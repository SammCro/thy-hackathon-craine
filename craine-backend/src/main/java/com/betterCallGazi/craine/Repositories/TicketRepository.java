package com.betterCallGazi.craine.Repositories;

import com.betterCallGazi.craine.Models.Ticket;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface TicketRepository extends JpaRepository<Ticket, Long> {
    // manuel sql query to get all tickets by user name
    @Query(value = "SELECT * FROM tickets WHERE user = ?1", nativeQuery = true)
    List<Ticket> findAllByUserName(String userName);

    //sql query that returns all old tickets
    @Query(value = "SELECT * FROM tickets WHERE is_old = 1", nativeQuery = true)
    List<Ticket> findAllOldTickets();

    //sql query that returns all old tickets by username
    @Query(value = "SELECT * FROM tickets WHERE is_old = 1 AND user = ?1", nativeQuery = true)
    List<Ticket> findAllOldTicketsByUserName(String userName);
}
