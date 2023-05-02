package com.betterCallGazi.craine.Repositories;

import com.betterCallGazi.craine.Models.Cargo;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface CargoRepository extends JpaRepository<Cargo, Long> {
    // manuel sql query to get all cargos by user name
    @Query(value = "SELECT * FROM cargos WHERE user = ?1", nativeQuery = true)
    List<Cargo> findAllByUserName(String userName);
}
