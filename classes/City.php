<?php

class City {
    private $name;
    private $country;
    private $description;
    private $population;
    private $famousLandmarks;
    private $climate;
    private $currency;
    
    public function __construct($name, $country, $description, $population, $famousLandmarks, $climate, $currency) {
        $this->name = $name;
        $this->country = $country;
        $this->description = $description;
        $this->population = $population;
        $this->famousLandmarks = $famousLandmarks;
        $this->climate = $climate;
        $this->currency = $currency;
    }
    
    // Getters
    public function getName() {
        return $this->name;
    }
    
    public function getCountry() {
        return $this->country;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    
    public function getPopulation() {
        return $this->population;
    }
    
    public function getFamousLandmarks() {
        return $this->famousLandmarks;
    }
    
    public function getClimate() {
        return $this->climate;
    }
    
    public function getCurrency() {
        return $this->currency;
    }
    
    // Method to get formatted population
    public function getFormattedPopulation() {
        return number_format($this->population);
    }
    
    // Method to get landmarks as HTML list
    public function getLandmarksAsHTML() {
        $html = '<ul>';
        foreach ($this->famousLandmarks as $landmark) {
            $html .= '<li>' . $landmark . '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
    
    // Method to display city card
    public function displayCard() {
        $html = '<div class="city-card">';
        $html .= '<div class="city-content">';
        $html .= '<h2>' . $this->name . ', ' . $this->country . '</h2>';
        $html .= '<p class="description">' . $this->description . '</p>';
        $html .= '<div class="city-details">';
        $html .= '<p><strong>Population:</strong> ' . $this->getFormattedPopulation() . '</p>';
        $html .= '<p><strong>Climate:</strong> ' . $this->climate . '</p>';
        $html .= '<p><strong>Currency:</strong> ' . $this->currency . '</p>';
        $html .= '</div>';
        $html .= '<div class="landmarks">';
        $html .= '<h3>Famous Landmarks:</h3>';
        $html .= $this->getLandmarksAsHTML();
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }
    
    // Method to display single city in detailed view
    public function displaySingleCity() {
        $html = '<div class="single-city">';
        $html .= '<div class="city-info">';
        $html .= '<h2>' . $this->name . ', ' . $this->country . '</h2>';
        $html .= '<p class="city-description">' . $this->description . '</p>';
        $html .= '<div class="city-stats">';
        $html .= '<div class="stat-item">';
        $html .= '<h4>Population</h4>';
        $html .= '<p>' . $this->getFormattedPopulation() . '</p>';
        $html .= '</div>';
        $html .= '<div class="stat-item">';
        $html .= '<h4>Climate</h4>';
        $html .= '<p>' . $this->climate . '</p>';
        $html .= '</div>';
        $html .= '<div class="stat-item">';
        $html .= '<h4>Currency</h4>';
        $html .= '<p>' . $this->currency . '</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="landmarks">';
        $html .= '<h3>Famous Landmarks:</h3>';
        $html .= $this->getLandmarksAsHTML();
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }
}
