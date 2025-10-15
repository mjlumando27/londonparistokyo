<?php

require_once 'City.php';

class CityManager {
    private $cities = [];
    
    public function __construct() {
        $this->initializeCities();
    }
    
    private function initializeCities() {
        // London
        $this->cities[] = new City(
            'London',
            'United Kingdom',
            'London is the capital and largest city of England and the United Kingdom. It is a vibrant metropolis with a rich history spanning over two millennia. Known for its iconic landmarks, world-class museums, and diverse culture, London attracts millions of visitors each year.',
            8982000,
            ['Big Ben', 'Tower Bridge', 'London Eye', 'Buckingham Palace', 'Westminster Abbey', 'Tower of London'],
            'Temperate oceanic climate with mild winters and warm summers',
            'British Pound (£)'
        );
        
        // Tokyo
        $this->cities[] = new City(
            'Tokyo',
            'Japan',
            'Tokyo is the capital and largest city of Japan, and one of the most populous metropolitan areas in the world. It is a fascinating blend of traditional Japanese culture and cutting-edge technology. The city offers an incredible mix of ancient temples, modern skyscrapers, and vibrant street life.',
            13960000,
            ['Tokyo Skytree', 'Senso-ji Temple', 'Tokyo Tower', 'Meiji Shrine', 'Shibuya Crossing', 'Imperial Palace'],
            'Humid subtropical climate with hot, humid summers and mild winters',
            'Japanese Yen (¥)'
        );
        
        // Paris
        $this->cities[] = new City(
            'Paris',
            'France',
            'Paris, the City of Light, is the capital and largest city of France. Known worldwide for its art, fashion, cuisine, and romantic atmosphere, Paris is home to some of the most iconic landmarks in the world. The city has been a center of culture, politics, and commerce for centuries.',
            2161000,
            ['Eiffel Tower', 'Louvre Museum', 'Notre-Dame Cathedral', 'Arc de Triomphe', 'Champs-Élysées', 'Sacré-Cœur'],
            'Oceanic climate with mild winters and warm summers',
            'Euro (€)'
        );
    }
    
    public function getAllCities() {
        return $this->cities;
    }
    
    public function getCityByName($name) {
        foreach ($this->cities as $city) {
            if (strtolower($city->getName()) === strtolower($name)) {
                return $city;
            }
        }
        return null;
    }
    
    public function getCitiesByCountry($country) {
        $filteredCities = [];
        foreach ($this->cities as $city) {
            if (strtolower($city->getCountry()) === strtolower($country)) {
                $filteredCities[] = $city;
            }
        }
        return $filteredCities;
    }
    
    public function displayAllCities() {
        $html = '<div class="cities-container">';
        foreach ($this->cities as $city) {
            $html .= $city->displayCard();
        }
        $html .= '</div>';
        return $html;
    }
    
    public function getCitiesCount() {
        return count($this->cities);
    }
    
    public function displaySingleCity($cityName) {
        $city = $this->getCityByName($cityName);
        if ($city) {
            return $city->displaySingleCity();
        }
        return '<div class="error-message"><h2>City not found</h2><p>The requested city could not be found.</p></div>';
    }
}
