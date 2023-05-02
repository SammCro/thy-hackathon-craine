package com.betterCallGazi.craine.Utilities;

import net.minidev.json.JSONObject;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.client.RestTemplate;

import java.util.List;
import java.util.logging.Logger;

public class ImageSizer {
    // a function that takes image base64 and send it to machine learning server and respond will be a string and return it
    private static String machineLearningServerUrl = "http://10.0.109.29:8080/detectObjectType";
    public static JSONObject processImage(String base64Image) {
        try{
            // Call machine learning endpoint
            RestTemplate restTemplate = new RestTemplate();
            String requestBody = "{\"imageBase64\":\"" + base64Image + "\"}";

            Logger.getGlobal().info("Sending request to " + machineLearningServerUrl + " with body: " + requestBody);
            JSONObject response = restTemplate.postForObject(machineLearningServerUrl, requestBody, JSONObject.class);

            return response;
        }
        catch (Exception e) {
            Logger.getGlobal().info("Error: " + e.getMessage());
            return null;
        }

    }
}
