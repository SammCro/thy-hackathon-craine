package com.betterCallGazi.craine.Services;

import com.betterCallGazi.craine.Models.Cargo;
import com.betterCallGazi.craine.Models.Ticket;
import com.betterCallGazi.craine.Models.User;
import com.betterCallGazi.craine.Repositories.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class UserService {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private TicketService ticketService;

    @Autowired
    private CargoService cargoService;

    public List<User> getAllUsers() {
        return userRepository.findAll();
    }

    public User getUserById(Long id) {
        return userRepository.findById(id).get();
    }

    public User createUser(User user) {
        return userRepository.save(user);
    }

    public User updateUser(User user) {
        return userRepository.save(user);
    }

    public void deleteUser(Long id) {
        userRepository.deleteById(id);
    }


    public List<Cargo> getCargosByUserName(String username) {
        return cargoService.getAllCargosByUsername(username);
    }

    public List<Ticket> getTicketsByUserName(String username) {
        return ticketService.getAllTicketsByUsername(username);
    }
}
