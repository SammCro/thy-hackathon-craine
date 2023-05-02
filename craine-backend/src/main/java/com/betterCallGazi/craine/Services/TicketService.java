package com.betterCallGazi.craine.Services;

import com.betterCallGazi.craine.Models.Ticket;
import com.betterCallGazi.craine.Repositories.TicketRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class TicketService {

    @Autowired
    private TicketRepository ticketRepository;

    public List<Ticket> getAllTickets() {
        return ticketRepository.findAll();
    }

    public Ticket getTicketById(Long id) {
        return ticketRepository.findById(id).get();
    }

    public Ticket addTicket(Ticket ticket) {
        List<Ticket> allOldTickets = getAllOldTickets();
        List<Ticket> allOldTicketsByUsername = getAllOldTicketsByUsername(ticket.getUser());

        if (allOldTicketsByUsername.size() > 0) {
            double averageCheckInTimeByUser = allOldTicketsByUsername.stream().mapToDouble(Ticket::getCheckInTime).average().getAsDouble();
            double averageCheckInTime = allOldTickets.stream().mapToDouble(Ticket::getCheckInTime).average().getAsDouble();

            if (averageCheckInTimeByUser < averageCheckInTime) {
                ticket.setTicketColor("green");
            } else {
                ticket.setTicketColor("red");
            }
        } else {
            ticket.setTicketColor("green");
        }
        return ticketRepository.save(ticket);
    }

    public Ticket updateTicket(Ticket ticket) {
        return ticketRepository.save(ticket);
    }

    public void deleteTicket(Long id) {
        ticketRepository.deleteById(id);
    }

    public List<Ticket> getAllTicketsByUsername(String username) {
        return ticketRepository.findAllByUserName(username);
    }

    public List<Ticket> getAllOldTickets() {
        return ticketRepository.findAllOldTickets();
    }

    public List<Ticket> getAllOldTicketsByUsername(String username) {
        return ticketRepository.findAllOldTicketsByUserName(username);
    }
}