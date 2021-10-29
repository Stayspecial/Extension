<?php
namespace Learning\ThirdUnit\Model\Config\Region;
class RegionInformationProvider
{
protected $countryInformationAcquirer;
protected $addressRepository;
protected $disallowedUsStates;
public function __construct(\Magento\Directory\Api\CountryInformationAcquirerInterface $countryInformationAcquirer)
{
$this->countryInformationAcquirer = $countryInformationAcquirer;
}
public function toOptionArray()
{
$countries = $this->countryInformationAcquirer->getCountriesInfo();
//print_r($countries);
foreach ($countries as $country) {
// Get regions for this country:
$regions = [];
if ($availableRegions = $country->getAvailableRegions()) {
foreach ($availableRegions as $region) {
$regions[] = [
'value' => $region->getName(),
'label' => $region->getName()
];
}
}
}
//echo '<pre>'; print_r($regions);
return $regions;
}
 
}
