package com.betterCallGazi.craine.Controllers;

import com.betterCallGazi.craine.Models.Cargo;
import com.betterCallGazi.craine.Models.Ticket;
import com.betterCallGazi.craine.Models.User;
import com.betterCallGazi.craine.Repositories.UserRepository;
import com.betterCallGazi.craine.Services.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@CrossOrigin
@RequestMapping("/api/users")
public class UserController {
        // inject user service
        @Autowired
        private UserService userService;

        @GetMapping
        public List<User> getAllUsers() {
            return userService.getAllUsers();
        }

        @GetMapping("/{id}")
        public User getUserById(@PathVariable Long id) {
            return userService.getUserById(id);
        }

        @PostMapping
        public User createUser(@RequestBody User user) {
            if (user.getEmail().contains("@thy.com")){
                user.setRole("technical");
            } else {
                user.setRole("passenger");
            }
            return userService.createUser(user);
        }

        @PutMapping("/{id}")
        public User updateUser(@RequestBody User user) {
            return userService.updateUser(user);
        }

        @DeleteMapping("/{id}")
        public void deleteUser(@PathVariable Long id) {
            userService.deleteUser(id);
        }

        @GetMapping("/{username}/tickets")
        public List<Ticket> getTicketsByUserId(@PathVariable String username) {
            return userService.getTicketsByUserName(username);
        }

        @GetMapping("/{username}/cargos")
        public List<Cargo> getCargosByUserId(@PathVariable String username) {
            return userService.getCargosByUserName(username);
        }

}
