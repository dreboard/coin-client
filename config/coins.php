<?php

use App\Http\Helpers\AttributeHelper;
use App\Http\Helpers\CoinHelper;
return [
    'proofs' => ['Proof', 'Matte Proof', 'Reverse Proof'],

    'snowTypes' => ['Indian Head', 'Flying Eagle'],
    'vamTypes' => ['Morgan Dollar', 'Peace Dollar'],
    'firstDayCats' => array('Dollar', 'Quarter', 'Nickel'),

    'colorCategories' => AttributeHelper::getColorCategories(),
    'colorTypes' => array('Lincoln Wheat', 'Lincoln Memorial', 'Indian Head', 'Flying Eagle'),

    'bandTypes' => array('Roosevelt Dime', 'Winged Liberty Dime'),

    'seatedTypes' => AttributeHelper::getSeatedTypes(), //,

    'varietyTypes' => array('Indian Head', 'Flying Eagle', 'Lincoln Wheat', 'Lincoln Memorial', 'Liberty Cap Half Dime', 'Seated Liberty Half Dime', 'Liberty Cap Dime', 'Seated Liberty Dime', 'Barber Dime', 'Winged Liberty Dime', 'Roosevelt Dime', 'Twenty Cent Piece', 'Liberty Cap Quarter', 'Seated Liberty Quarter', 'Barber Quarter', 'Standing Liberty', 'Washington Quarter', 'Seated Liberty Half Dollar', 'Barber Half Dollar', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Seated Liberty Dollar', 'Susan B Anthony Dollar', 'Trade Dollar', 'Morgan Dollar', 'Peace Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar', 'Liberty Head Gold Dollar', 'Indian Princess Gold Dollar', 'Coronet Head Quarter Eagle', 'Indian Princess Three Dollar', 'Liberty Cap Half Eagle', 'Turban Head Half Eagle', 'Coronet Head Half Eagle', 'Indian Head Half Eagle', 'Coronet Head Eagle', 'Saint Gaudens Double Eagle', 'Coronet Head Double Eagle', 'Commemorative Half Dollar', 'Silver Dollar', 'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold', 'One Ounce Gold', 'Quarter Ounce Platinum'),

    'mintsetTypes' => array('Westward Journey', 'Lincoln Bicentennial', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Commemorative Half Dollar', 'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold', 'One Ounce Gold', 'Quarter Ounce Platinum'),

    'folderTypes' => array('Flying Eagle', 'Indian Head Nickel', 'Westward Journey', 'Jefferson Nickel', 'Return to Monticello', 'Lincoln Wheat', 'Lincoln Memorial', 'Lincoln Bicentennial', 'Union Shield', 'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter', 'State Quarter', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar'),
    'rollTypes' => array('Flying Eagle', 'Indian Head Nickel', 'Westward Journey', 'Jefferson Nickel', 'Return to Monticello', 'Lincoln Wheat', 'Lincoln Memorial', 'Lincoln Bicentennial', 'Union Shield', 'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar', 'District of Columbia and US Territories', 'State Quarter', 'America the Beautiful Quarter'),

    'boxTypes' => array('Indian Head Nickel', 'Westward Journey', 'Jefferson Nickel', 'Return to Monticello', 'Lincoln Wheat', 'Lincoln Memorial', 'Lincoln Bicentennial', 'Union Shield', 'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar', 'District of Columbia and US Territories', 'State Quarter', 'America the Beautiful Quarter'),

    'albumCategories' => array('Small Cent', 'Large Cent', 'Half Cent'),

    'fullTypes' => array('Jefferson Nickel', 'Standing Liberty', 'Winged Liberty Dime', 'Franklin Half Dollar', 'Roosevelt Dime'),
    'satinTypes' => array('Lincoln Wheat', 'Lincoln Memorial', 'Lincoln Bicentennial', 'Sacagawea Dollar'),

    'cameoTypes' => array('Lincoln Wheat', 'Lincoln Memorial', 'Jefferson Nickel', 'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar', 'Commemorative Half Dollar', 'Silver Dollar', 'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold', 'One Ounce Gold', 'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo', 'Half Ounce Buffalo', 'One Ounce Buffalo', 'Tenth Ounce Platinum', 'Quarter Ounce Platinum', 'Half Ounce Platinum', 'One Ounce Platinum'),
    'ultraCameoTypes' => array('Lincoln Wheat', 'Lincoln Memorial', 'Jefferson Nickel', 'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar', 'Commemorative Half Dollar', 'Silver Dollar', 'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold', 'One Ounce Gold', 'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo', 'Half Ounce Buffalo', 'One Ounce Buffalo', 'Tenth Ounce Platinum', 'Quarter Ounce Platinum', 'Half Ounce Platinum', 'One Ounce Platinum'),
    'deepCameoTypes' => array('Lincoln Wheat', 'Lincoln Memorial', 'Jefferson Nickel', 'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar', 'Commemorative Half Dollar', 'Silver Dollar', 'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold', 'One Ounce Gold', 'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo', 'Half Ounce Buffalo', 'One Ounce Buffalo', 'Tenth Ounce Platinum', 'Quarter Ounce Platinum', 'Half Ounce Platinum', 'One Ounce Platinum'),

    'bulkTypes' => array('Indian Head', 'Flying Eagle', 'Lincoln Wheat', 'Lincoln Memorial', 'Lincoln Bicentennial', 'Union Sheild', 'Shield Nickel', 'Indian Head Nickel', 'Westward Journey', 'Jefferson Nickel', 'Return to Monticello', 'Seated Liberty Dime', 'Barber Dime', 'Winged Liberty Dime', 'Roosevelt Dime', 'State Quarter', 'Barber Quarter', 'Standing Liberty', 'Washington Quarter', 'Seated Liberty Half Dollar', 'Barber Half Dollar', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Seated Liberty Dollar', 'Susan B Anthony Dollar', 'Trade Dollar', 'Morgan Dollar', 'Peace Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar'),
    'bullionTypes' => array('Liberty Head Gold Dollar', 'Indian Princess Gold Dollar', 'Coronet Head Quarter Eagle', 'Indian Princess Three Dollar', 'Liberty Cap Half Eagle', 'Turban Head Half Eagle', 'Coronet Head Half Eagle', 'Indian Head Half Eagle', 'Coronet Head Eagle', 'Saint Gaudens Double Eagle', 'Coronet Head Double Eagle', 'Commemorative Half Dollar', 'Silver Dollar', 'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold', 'One Ounce Gold', 'Quarter Ounce Platinum', 'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo', 'Half Ounce Buffalo', 'One Ounce Buffalo'),

];
