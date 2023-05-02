package com.betterCallGazi.craine.Repositories;

import com.betterCallGazi.craine.Models.User;
import org.springframework.data.jpa.repository.JpaRepository;
public interface UserRepository extends JpaRepository<User, Long>{
}
