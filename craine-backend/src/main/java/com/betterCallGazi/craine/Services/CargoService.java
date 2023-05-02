package com.betterCallGazi.craine.Services;

import com.betterCallGazi.craine.Models.Cargo;
import com.betterCallGazi.craine.Repositories.CargoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class CargoService {
    @Autowired
    private CargoRepository cargoRepository;

    public List<Cargo> getAllCargos() {
        return cargoRepository.findAll();
    }

    public Cargo getCargoById(Long id) {
        return cargoRepository.findById(id).get();
    }

    public Cargo createCargo(Cargo cargo) {
        return cargoRepository.save(cargo);
    }

    public Cargo updateCargo(Cargo cargo) {
        return cargoRepository.save(cargo);
    }

    public void deleteCargo(Long id) {
        cargoRepository.deleteById(id);
    }

    public List<Cargo> getAllCargosByUsername(String username) {
        return cargoRepository.findAllByUserName(username);
    }
}