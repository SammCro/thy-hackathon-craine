package com.betterCallGazi.craine.Controllers;

import com.betterCallGazi.craine.Models.Cargo;
import com.betterCallGazi.craine.Services.CargoService;
import com.betterCallGazi.craine.Utilities.ImageSizer;
import org.json.JSONObject;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.io.IOException;
import java.util.List;
import java.util.logging.Logger;



@RestController
@CrossOrigin
@RequestMapping("/api/cargos")
public class CargoController {
    @Autowired
    private CargoService cargoService;
    @GetMapping
    public List<Cargo> getAllCargos() {
        return cargoService.getAllCargos();
    }
    @PostMapping("/upload-image")
    public JSONObject uploadImage(@RequestBody String imageBase64) throws IOException {
        // logger for debugging
        try {
            String sizes =  ImageSizer.processImage(imageBase64).getAsString("sizes");

            Cargo cargo = new Cargo();
            cargo.setSize(sizes);
        }
        catch (Exception e) {
            Logger.getGlobal().info("Error: " + e.getMessage());
        }

        //return a response jsonobject and it has success and values are true and false
        JSONObject response = new JSONObject();
        response.put("success", true);
        return response;
    }

    @GetMapping("/{id}")
    public Cargo getCargoById(@PathVariable Long id) {
        return cargoService.getCargoById(id);
    }

    @PostMapping
    public Cargo createCargo(@RequestBody Cargo cargo) {
        return cargoService.createCargo(cargo);
    }

    @PutMapping("/{id}")
    public Cargo updateCargo(@RequestBody Cargo cargo) {
        return cargoService.updateCargo(cargo);
    }

    @DeleteMapping("/{id}")
    public void deleteCargo(@PathVariable Long id) {
        cargoService.deleteCargo(id);
    }
}
