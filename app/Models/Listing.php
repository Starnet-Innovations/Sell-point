<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


#[Fillable(['listing_type', 'title', 'description', 'price', 'attributes', 'address', 'city', 'state', 'image', 'status', 'is_verified', 'user_id', 'category_id', 'views'])]
class Listing extends Model
{
    use SoftDeletes;

    protected $casts = [
        'attributes' => 'array',        
        'is_verified' => 'boolean',
        'price' => 'decimal:2',
        'views' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public static function getSchemas()
    {
        return [
            'cars' => [
                'make' => ['type' => 'text', 'label' => 'Make', 'required' => true],
                'model' => ['type' => 'text', 'label' => 'Model', 'required' => true],
                'year' => ['type' => 'number', 'label' => 'Year', 'required' => true],
                'mileage' => ['type' => 'number', 'label' => 'Mileage (km)', 'required' => true],
                'transmission' => ['type' => 'select', 'label' => 'Transmission', 'options' => ['Automatic', 'Manual', 'Tiptronic', 'CVT']],
                'fuel_type' => ['type' => 'select', 'label' => 'Fuel Type', 'options' => ['Petrol', 'Diesel', 'Electric', 'Hybrid', 'CNG', 'LPG', 'Ethanol']],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Foreign Used (Tokunbo)', 'Nigerian Used (Local)', 'Reconditioned', 'Accidented/For Parts']],
                'colour' => ['type' => 'text', 'label' => 'Colour'],
                'engine_size' => ['type' => 'text', 'label' => 'Engine Size (e.g., 1.8L, 2.5L Turbo)'],
                'drive_type' => ['type' => 'select', 'label' => 'Drive Type', 'options' => ['Front-Wheel Drive (FWD)', 'Rear-Wheel Drive (RWD)', 'All-Wheel Drive (AWD)', '4-Wheel Drive (4WD)', '4x4']],
                'seats' => ['type' => 'number', 'label' => 'Number of Seats'],
                'doors' => ['type' => 'number', 'label' => 'Number of Doors'],
                'body_type' => ['type' => 'select', 'label' => 'Body Type', 'options' => ['Sedan', 'SUV', 'Coupe', 'Convertible', 'Hatchback', 'Wagon', 'Minivan', 'Pickup Truck', 'Bus', 'Truck', 'Van', 'Crossover']],
                'assembly' => ['type' => 'select', 'label' => 'Assembly', 'options' => ['Local Assembly', 'Foreign Assembly', 'Completely Built Unit (CBU)']],
                'owners' => ['type' => 'number', 'label' => 'Number of Previous Owners'],
                'service_history' => ['type' => 'select', 'label' => 'Service History', 'options' => ['Yes', 'No', 'Partial']],
                'certified' => ['type' => 'select', 'label' => 'Certified Pre-Owned', 'options' => ['Yes', 'No']],
                'imported_from' => ['type' => 'text', 'label' => 'Imported From (Country)'],
                'registration_status' => ['type' => 'select', 'label' => 'Registration Status', 'options' => ['Registered', 'Unregistered', 'Customs Cleared']],
                'custom_duty_paid' => ['type' => 'select', 'label' => 'Custom Duty Paid', 'options' => ['Yes', 'No']]
            ],
            'cars_spare_parts' => [
                'part_type' => ['type' => 'select', 'label' => 'Part Type', 'options' => ['Engine', 'Transmission', 'Brakes', 'Suspension', 'Electrical', 'Body Parts', 'Interior', 'Exhaust', 'Cooling System', 'Steering', 'Wheels & Tyres', 'Lighting', 'Filters', 'Belts & Hoses', 'Sensors', 'Turbochargers', 'Alternator', 'Starter', 'Battery', 'Radiator', 'Air Conditioner']],
                'compatible_makes' => ['type' => 'text', 'label' => 'Compatible Makes (e.g., Toyota, Honda)'],
                'compatible_models' => ['type' => 'text', 'label' => 'Compatible Models'],
                'compatible_years' => ['type' => 'text', 'label' => 'Compatible Years'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Original', 'Used - Aftermarket', 'Reconditioned', 'Refurbished', 'For Scrap']],
                'oem_number' => ['type' => 'text', 'label' => 'OEM Part Number'],
                'warranty_months' => ['type' => 'number', 'label' => 'Warranty (months)']
            ],
            'properties_for_sale' => [
                'property_type' => ['type' => 'select', 'label' => 'Property Type', 'options' => ['Flat/Apartment', 'Detached House (Bungalow)', 'Semi-Detached House', 'Terraced House', 'Duplex', 'Mansion', 'Penthouse', 'Land/Plot', 'Farm Land', 'Commercial Property', 'Office Space', 'Shop/Retail Space', 'Warehouse', 'Factory', 'Hotel/Lodge', 'School Property', 'Religious Property', 'Showroom', 'Event Centre']],
                'bedrooms' => ['type' => 'number', 'label' => 'Bedrooms'],
                'bathrooms' => ['type' => 'number', 'label' => 'Bathrooms'],
                'toilets' => ['type' => 'number', 'label' => 'Toilets'],
                'living_rooms' => ['type' => 'number', 'label' => 'Living/Dining Rooms'],
                'kitchen' => ['type' => 'select', 'label' => 'Kitchen Type', 'options' => ['Open', 'Closed', 'Modern Fitted', 'Basic']],
                'land_size' => ['type' => 'text', 'label' => 'Land Size (sqm / sqft / plots / acres)'],
                'floor_area' => ['type' => 'text', 'label' => 'Floor Area (sqm)'],
                'furnishing' => ['type' => 'select', 'label' => 'Furnishing', 'options' => ['Fully Furnished', 'Semi-Furnished', 'Unfurnished', 'Shell/Empty']],
                'parking' => ['type' => 'text', 'label' => 'Parking (Car spaces / Garage)'],
                'fenced' => ['type' => 'select', 'label' => 'Fenced/Walled', 'options' => ['Yes', 'No', 'Partially']],
                'security' => ['type' => 'text', 'label' => 'Security Features (CCTV, Guard, etc.)'],
                'power_supply' => ['type' => 'select', 'label' => 'Power Supply', 'options' => ['NEPA/PHCN', 'Solar', 'Inverter', 'Generator', '24/7 Light']],
                'water_supply' => ['type' => 'select', 'label' => 'Water Supply', 'options' => ['Borehole', 'Well', 'Government', 'Tanker', 'Storage Tank']],
                'service_charge' => ['type' => 'text', 'label' => 'Service Charge (per year)'],
                'title_document' => ['type' => 'select', 'label' => 'Title Document', 'options' => ['Certificate of Occupancy (C of O)', 'Governor\'s Consent', 'Deed of Assignment', 'Survey Plan', 'Land Use Act', 'Family/Community Land', 'No Document']],
                'listing_purpose' => ['type' => 'select', 'label' => 'Listing Purpose', 'options' => ['For Sale', 'For Rent', 'For Lease', 'Shortlet', 'For Auction']]
            ],
            'properties_for_rent' => [
                'property_type' => ['type' => 'select', 'label' => 'Property Type', 'options' => ['Flat/Apartment', 'Detached House', 'Semi-Detached House', 'Duplex', 'Room Self Contain', 'Mini Flat', 'Boys Quarters', 'Shop/Retail', 'Office', 'Warehouse', 'Land']],
                'bedrooms' => ['type' => 'number', 'label' => 'Bedrooms'],
                'bathrooms' => ['type' => 'number', 'label' => 'Bathrooms'],
                'rental_period' => ['type' => 'select', 'label' => 'Rental Period', 'options' => ['Monthly', 'Quarterly', 'Bi-Annually', 'Yearly', 'Negotiable']],
                'minimum_lease' => ['type' => 'text', 'label' => 'Minimum Lease Duration'],
                'agent_fee' => ['type' => 'select', 'label' => 'Agent Fee Required', 'options' => ['Yes (Standard 10%)', 'Yes (Negotiable)', 'No', 'Landlord Direct']],
                'caution_fee' => ['type' => 'text', 'label' => 'Caution Fee'],
                'service_charge' => ['type' => 'text', 'label' => 'Service Charge'],
                'furnishing' => ['type' => 'select', 'label' => 'Furnishing', 'options' => ['Fully Furnished', 'Semi-Furnished', 'Unfurnished']],
                'parking' => ['type' => 'text', 'label' => 'Parking'],
                'security' => ['type' => 'text', 'label' => 'Security Deposit'],
                'power_supply' => ['type' => 'select', 'label' => 'Power Supply', 'options' => ['NEPA/PHCN', 'Solar', 'Inverter', 'Generator Included', 'Prepaid Meter', 'Postpaid Meter']]
            ],
            'phones_tablets' => [
                'brand' => ['type' => 'select', 'label' => 'Brand', 'options' => ['Apple iPhone', 'Samsung', 'Tecno', 'Infinix', 'Itel', 'Nokia', 'Xiaomi', 'Oppo', 'Vivo', 'Huawei', 'Google Pixel', 'OnePlus', 'Realme', 'LG', 'Sony', 'Gionee', 'BlackBerry', 'HTC', 'Motorola', 'Microsoft Lumia', 'Other']],
                'model' => ['type' => 'text', 'label' => 'Model', 'required' => true],
                'storage' => ['type' => 'select', 'label' => 'Storage Capacity', 'options' => ['16GB', '32GB', '64GB', '128GB', '256GB', '512GB', '1TB']],
                'ram' => ['type' => 'select', 'label' => 'RAM', 'options' => ['1GB', '2GB', '3GB', '4GB', '6GB', '8GB', '12GB', '16GB']],
                'screen_size' => ['type' => 'text', 'label' => 'Screen Size (inches)'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New (Sealed)', 'Brand New (Opened Box)', 'Used - Like New (No Scratches)', 'Used - Excellent (Minor Scratches)', 'Used - Good (Visible Wear)', 'Used - Fair (Functional but worn)', 'For Parts/Repair Only']],
                'network' => ['type' => 'select', 'label' => 'Network / SIM', 'options' => ['Single SIM', 'Dual SIM', 'Triple SIM', 'eSIM', 'Factory Unlocked', 'Network Locked']],
                'colour' => ['type' => 'text', 'label' => 'Colour'],
                'battery_health' => ['type' => 'text', 'label' => 'Battery Health (%)', 'placeholder' => 'For used phones'],
                'warranty' => ['type' => 'text', 'label' => 'Warranty Remaining'],
                'original_box' => ['type' => 'select', 'label' => 'Original Box Included', 'options' => ['Yes', 'No']],
                'accessories_included' => ['type' => 'text', 'label' => 'Accessories Included (Charger, Earphones, etc.)'],
                'repair_history' => ['type' => 'select', 'label' => 'Repair History', 'options' => ['Never Repaired', 'Screen Replaced', 'Battery Replaced', 'Other Repairs']],
                'icloud_locked' => ['type' => 'select', 'label' => 'iCloud/FRP Lock', 'options' => ['Unlocked', 'Locked (Not usable)', 'Unknown']]
            ],
            'laptops_computers' => [
                'brand' => ['type' => 'select', 'label' => 'Brand', 'options' => ['Apple MacBook', 'HP', 'Dell', 'Lenovo', 'Acer', 'Asus', 'Microsoft Surface', 'Toshiba', 'Samsung', 'Sony Vaio', 'Fujitsu', 'LG', 'MSI', 'Razer', 'Huawei MateBook', 'Xiaomi Mi Notebook', 'Other']],
                'model' => ['type' => 'text', 'label' => 'Model', 'required' => true],
                'processor' => ['type' => 'text', 'label' => 'Processor (e.g., Intel Core i5, Apple M2)'],
                'ram' => ['type' => 'select', 'label' => 'RAM', 'options' => ['2GB', '4GB', '8GB', '16GB', '32GB', '64GB', '128GB']],
                'storage_type' => ['type' => 'select', 'label' => 'Storage Type', 'options' => ['SSD', 'HDD', 'SSHD', 'NVMe', 'Hybrid']],
                'storage_capacity' => ['type' => 'select', 'label' => 'Storage Capacity', 'options' => ['64GB', '128GB', '256GB', '512GB', '1TB', '2TB', '4TB']],
                'screen_size' => ['type' => 'text', 'label' => 'Screen Size (inches)'],
                'graphics_card' => ['type' => 'text', 'label' => 'Graphics Card (GPU)'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New (Sealed)', 'Brand New (Opened)', 'Used - Mint', 'Used - Good', 'Used - Fair', 'Refurbished', 'For Parts']],
                'os_installed' => ['type' => 'select', 'label' => 'Operating System Installed', 'options' => ['Windows 11', 'Windows 10', 'Windows 8/8.1', 'Windows 7', 'macOS', 'Linux/Ubuntu', 'Chrome OS', 'No OS']],
                'warranty' => ['type' => 'text', 'label' => 'Warranty Remaining'],
                'accessories' => ['type' => 'text', 'label' => 'Accessories Included (Charger, Bag, Mouse, etc.)']
            ],
            'electronics' => [
                'category' => ['type' => 'select', 'label' => 'Electronics Category', 'options' => ['Television', 'Home Theatre', 'Speaker & Soundbar', 'Headphones & Earphones', 'Camera & Camcorder', 'Video Game Console', 'Projector', 'DVD/Blu-ray Player', 'Radio & Boombox', 'MP3/MP4 Player', 'Smart Watch', 'Fitness Tracker', 'Drone', 'VR Headset']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'model' => ['type' => 'text', 'label' => 'Model'],
                'screen_size' => ['type' => 'text', 'label' => 'Screen Size (for TVs, Monitors)'],
                'resolution' => ['type' => 'select', 'label' => 'Resolution', 'options' => ['HD Ready (720p)', 'Full HD (1080p)', '4K Ultra HD', '8K', 'Retina', 'Other']],
                'smart_tv' => ['type' => 'select', 'label' => 'Smart TV / Smart Features', 'options' => ['Yes', 'No']],
                'connectivity' => ['type' => 'text', 'label' => 'Connectivity (HDMI, USB, Bluetooth, WiFi)'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Like New', 'Used - Good', 'Used - Fair', 'Refurbished', 'For Parts']],
                'warranty' => ['type' => 'text', 'label' => 'Warranty'],
                'remote_included' => ['type' => 'select', 'label' => 'Remote Control Included', 'options' => ['Yes', 'No']],
                'power_voltage' => ['type' => 'text', 'label' => 'Power / Voltage (e.g., 110-240V)']
            ],
            'home_appliances' => [
                'appliance_type' => ['type' => 'select', 'label' => 'Appliance Type', 'options' => ['Refrigerator', 'Freezer', 'Air Conditioner', 'Washing Machine', 'Dryer', 'Dishwasher', 'Microwave', 'Oven', 'Cooker/Stove', 'Generator', 'Inverter', 'Water Heater', 'Water Dispenser', 'Vacuum Cleaner', 'Iron', 'Fan', 'Blender', 'Electric Kettle', 'Toaster', 'Food Processor', 'Air Fryer', 'Rice Cooker', 'Juicer', 'Sewing Machine', 'Fridge/Freezer Combo']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'model' => ['type' => 'text', 'label' => 'Model'],
                'capacity' => ['type' => 'text', 'label' => 'Capacity (Liters / kg / BTU)'],
                'energy_rating' => ['type' => 'text', 'label' => 'Energy Efficiency Rating'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Like New', 'Used - Good', 'Used - Fair', 'Refurbished', 'Not Working/For Parts']],
                'warranty' => ['type' => 'text', 'label' => 'Warranty Remaining'],
                'colour' => ['type' => 'text', 'label' => 'Colour'],
                'inverter_type' => ['type' => 'select', 'label' => 'Inverter (for AC/Fridge)', 'options' => ['Yes (Inverter)', 'No (Non-Inverter)']],
                'remote_included' => ['type' => 'select', 'label' => 'Remote Control Included', 'options' => ['Yes', 'No']]
            ],
            'fashion_men' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Shirts', 'T-Shirts', 'Polos', 'Trousers', 'Jeans', 'Shorts', 'Suits & Blazers', 'Jackets & Coats', 'Sweaters & Hoodies', 'Traditional Wear (Agbada, Kaftan, Dashiki)', 'Sports Wear', 'Sleepwear & Loungewear', 'Underwear & Socks', 'Swimwear']],
                'size' => ['type' => 'select', 'label' => 'Size', 'options' => ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', '4XL', '5XL', 'Custom/Tailored']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'material' => ['type' => 'text', 'label' => 'Material (e.g., Cotton, Polyester, Linen, Silk)'],
                'colour' => ['type' => 'text', 'label' => 'Colour'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New with Tags', 'Brand New without Tags', 'Used - Like New (Worn once/twice)', 'Used - Good (Minor wear)', 'Used - Fair (Visible wear but functional)']],
                'occasion' => ['type' => 'text', 'label' => 'Occasion (Casual, Formal, Office, Party, Wedding)'],
                'season' => ['type' => 'select', 'label' => 'Season', 'options' => ['Summer', 'Winter', 'All Season', 'Rainy', 'Harmattan']]
            ],
            'fashion_women' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Dresses', 'Tops & Blouses', 'T-Shirts', 'Shirts', 'Trousers & Pants', 'Jeans', 'Skirts', 'Shorts', 'Jackets & Coats', 'Blazers', 'Sweaters & Cardigans', 'Jumpsuits & Rompers', 'Suits & Workwear', 'Traditional Wear (Buba, Iro, Ankara, Kente, Wrapper)', 'Gowns & Evening Wear', 'Sportswear', 'Sleepwear & Lingerie', 'Maternity Wear', 'Swimwear & Cover-ups']],
                'size' => ['type' => 'select', 'label' => 'Size', 'options' => ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'Plus Size 1X', 'Plus Size 2X', 'Plus Size 3X', 'Free Size']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'material' => ['type' => 'text', 'label' => 'Material'],
                'colour' => ['type' => 'text', 'label' => 'Colour'],
                'pattern' => ['type' => 'text', 'label' => 'Pattern (Solid, Striped, Floral, Ankara Print)'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New with Tags', 'Brand New without Tags', 'Used - Like New', 'Used - Good', 'Used - Fair']],
                'occasion' => ['type' => 'text', 'label' => 'Occasion']
            ],
            'shoes' => [
                'gender' => ['type' => 'select', 'label' => 'Gender', 'options' => ['Men', 'Women', 'Unisex', 'Boys', 'Girls']],
                'shoe_type' => ['type' => 'select', 'label' => 'Shoe Type', 'options' => ['Sneakers/Trainers', 'Athletic/Running Shoes', 'Formal Shoes', 'Loafers', 'Oxfords', 'Brogues', 'Boots', 'Sandals', 'Slippers/Flip Flops', 'Heels (Stilettos, Pumps)', 'Flats', 'Wedges', 'Platforms', 'Espadrilles', 'Canvas Shoes', 'Crocs', 'Safety/Work Boots', 'Orthopedic Shoes']],
                'size' => ['type' => 'text', 'label' => 'Size (EU/UK/US/Nigeria)'],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'colour' => ['type' => 'text', 'label' => 'Colour'],
                'material' => ['type' => 'text', 'label' => 'Material (Leather, Suede, Canvas, Synthetic, Rubber)'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New in Box', 'Brand New (No Box)', 'Used - Like New', 'Used - Good', 'Used - Fair']],
                'original_box' => ['type' => 'select', 'label' => 'Original Box Included', 'options' => ['Yes', 'No']]
            ],
            'bags_luggage' => [
                'bag_type' => ['type' => 'select', 'label' => 'Bag Type', 'options' => ['Handbags', 'Shoulder Bags', 'Tote Bags', 'Backpacks', 'Clutches', 'Crossbody Bags', 'Satchels', 'Briefcases', 'Laptop Bags', 'Duffel Bags', 'Travel Luggage', 'Suitcases', 'Trolley Bags', 'Waist Packs', 'Gym Bags', 'School Bags', 'Lunch Bags', 'Makeup Bags']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'material' => ['type' => 'text', 'label' => 'Material (Leather, Canvas, Nylon, Polyester)'],
                'colour' => ['type' => 'text', 'label' => 'Colour'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New with Tags', 'Brand New (No Tags)', 'Used - Like New', 'Used - Good', 'Used - Fair']],
                'authenticity' => ['type' => 'select', 'label' => 'Authenticity', 'options' => ['Authentic/Original', 'Replica/High Quality', 'Not Specified']],
                'size_capacity' => ['type' => 'text', 'label' => 'Size / Capacity (Liters / Dimensions)']
            ],
            'watches_jewelry' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Wrist Watches', 'Smart Watches', 'Luxury Watches', 'Fashion Watches', 'Rings', 'Necklaces', 'Pendants', 'Earrings', 'Bracelets', 'Anklets', 'Brooches & Pins', 'Cufflinks', 'Tie Clips', 'Body Jewelry']],
                'brand' => ['type' => 'text', 'label' => 'Brand (Rolex, Cartier, Michael Kors, Casio, etc.)'],
                'material' => ['type' => 'text', 'label' => 'Material (Gold, Silver, Stainless Steel, Titanium, Leather, Platinum, Diamond)'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New (Sealed)', 'Brand New (Unworn)', 'Used - Like New', 'Used - Good', 'Used - Fair', 'Antique/Vintage']],
                'gender' => ['type' => 'select', 'label' => 'Gender', 'options' => ['Men', 'Women', 'Unisex']],
                'movement' => ['type' => 'select', 'label' => 'Watch Movement (if watch)', 'options' => ['Quartz', 'Automatic', 'Mechanical', 'Digital', 'Smartwatch OS']],
                'water_resistance' => ['type' => 'text', 'label' => 'Water Resistance'],
                'certification' => ['type' => 'text', 'label' => 'Certification (if gold/diamond)'],
                'original_box_papers' => ['type' => 'select', 'label' => 'Original Box & Papers Included', 'options' => ['Both', 'Box Only', 'Papers Only', 'None']]
            ],
            'baby_kids' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Baby Clothing (0-24 months)', 'Kids Clothing (2-10 years)', 'Teens Clothing', 'Baby Shoes', 'Kids Shoes', 'Diapers & Nappies', 'Baby Wipes & Hygiene', 'Baby Feeding (Bottles, Bibs, etc.)', 'Baby Food & Formula', 'Strollers & Prams', 'Car Seats', 'Baby Carriers & Wraps', 'Cribs & Cots', 'Baby Bouncers & Swings', 'Playpens & Playmats', 'Baby Bath & Potty', 'Toys (0-2 years)', 'Toys (3-5 years)', 'Toys (6+ years)', 'Educational Toys', 'Stuffed Toys', 'Outdoor Toys', 'Nursery Decor', 'Breastfeeding Supplies']],
                'age_range' => ['type' => 'text', 'label' => 'Age Range (e.g., 0-3 months, 1-2 years)'],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Like New', 'Used - Good', 'Used - Fair']],
                'size' => ['type' => 'text', 'label' => 'Size (for clothing)'],
                'material' => ['type' => 'text', 'label' => 'Material (Cotton, Organic, etc.)'],
                'safety_certified' => ['type' => 'select', 'label' => 'Safety Certified', 'options' => ['Yes', 'No', 'Unknown']]
            ],
            'health_beauty' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Skincare', 'Hair Care', 'Makeup & Cosmetics', 'Fragrances & Perfumes', 'Bath & Body', 'Nail Care', 'Men\'s Grooming', 'Beauty Tools & Devices', 'Hair Extensions & Wigs', 'Weaves & Braids', 'Wigs (Lace Front, Full Lace)', 'Beauty Supplements', 'Oral Care', 'Sexual Wellness', 'Feminine Hygiene', 'First Aid', 'Vitamins & Supplements', 'Medical Equipment', 'Mobility Aids', 'Massagers & Therapy', 'Essential Oils & Aromatherapy']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New (Sealed)', 'Brand New (Unsealed)', 'Used - Gently Used', 'Expired/Close to Expiry']],
                'expiry_date' => ['type' => 'date', 'label' => 'Expiry Date (if applicable)'],
                'size_volume' => ['type' => 'text', 'label' => 'Size / Volume (ml, g, oz)'],
                'ingredients' => ['type' => 'text', 'label' => 'Key Ingredients'],
                'skin_hair_type' => ['type' => 'text', 'label' => 'Recommended For (Skin/Hair Type)']
            ],
            'food_drinks' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Grains & Rice', 'Beans & Pulses', 'Flour & Baking', 'Pasta & Noodles', 'Canned Goods', 'Oil & Cooking Sprays', 'Spices & Seasonings', 'Snacks & Chips', 'Biscuits & Cookies', 'Candy & Chocolate', 'Soft Drinks & Sodas', 'Juices & Drinks', 'Water', 'Energy Drinks', 'Alcoholic Beverages', 'Wine & Champagne', 'Beer & Cider', 'Spirits & Liquor', 'Coffee & Tea', 'Milk & Dairy', 'Eggs', 'Frozen Foods', 'Fresh Produce', 'Meat & Poultry', 'Seafood', 'Baby Food', 'Health Foods', 'Organic Foods']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'expiry_date' => ['type' => 'date', 'label' => 'Expiry / Best Before Date', 'required' => true],
                'packaging' => ['type' => 'text', 'label' => 'Packaging Type (Bottle, Can, Box, Sachet)'],
                'quantity' => ['type' => 'text', 'label' => 'Quantity (e.g., 6 pack, 1.5L, 5kg)'],
                'halal_kosher_certified' => ['type' => 'select', 'label' => 'Certification', 'options' => ['None', 'Halal', 'Kosher', 'Organic', 'Non-GMO']],
                'storage_instructions' => ['type' => 'text', 'label' => 'Storage Instructions']
            ],
            'books_magazines' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Fiction Novels', 'Non-Fiction', 'Academic & Textbooks', 'Children\'s Books', 'Comics & Graphic Novels', 'Magazines & Journals', 'Religious Books', 'Self-Help & Motivational', 'Business & Finance', 'Biographies & Memoirs', 'History & Politics', 'Science & Technology', 'Art & Photography', 'Cooking & Food', 'Health & Fitness', 'Travel', 'Poetry', 'Drama & Plays', 'Dictionaries & Reference', 'Encyclopedias']],
                'title' => ['type' => 'text', 'label' => 'Book Title', 'required' => true],
                'author' => ['type' => 'text', 'label' => 'Author'],
                'isbn' => ['type' => 'text', 'label' => 'ISBN (if available)'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Like New (No marks)', 'Good (Minor wear)', 'Acceptable (Writing/marks)', 'Poor (Missing pages/cover)']],
                'edition' => ['type' => 'text', 'label' => 'Edition / Year Published'],
                'language' => ['type' => 'text', 'label' => 'Language', 'default' => 'English'],
                'hardcover_softcover' => ['type' => 'select', 'label' => 'Binding', 'options' => ['Hardcover', 'Paperback', 'Spiral', 'Digital/PDF']]
            ],
            'sporting_goods' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Fitness Equipment', 'Exercise Machines (Treadmill, Bike, etc.)', 'Weights & Dumbbells', 'Yoga & Pilates', 'Boxing & MMA', 'Football/Soccer', 'Basketball', 'Tennis & Racquet Sports', 'Golf', 'Swimming', 'Cycling', 'Running', 'Outdoor & Camping', 'Hiking', 'Fishing', 'Hunting', 'Martial Arts', 'Gymnastics', 'Dance', 'Skateboarding', 'Skiing & Snowboarding', 'Team Sports Equipment', 'Sports Apparel', 'Sports Footwear', 'Sports Bags', 'Nutrition & Supplements']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Like New', 'Used - Good', 'Used - Fair', 'Heavily Used']],
                'size' => ['type' => 'text', 'label' => 'Size (for apparel/shoes)'],
                'material' => ['type' => 'text', 'label' => 'Material'],
                'weight_limit' => ['type' => 'text', 'label' => 'Weight Limit (for equipment)']
            ],
            'pets_animals' => [
                'category' => ['type' => 'select', 'label' => 'Pet/Animal Type', 'options' => ['Dogs', 'Puppies', 'Adult Dogs', 'Cats', 'Kittens', 'Birds (Parrots, Lovebirds, etc.)', 'Fish & Aquarium', 'Rabbits', 'Guinea Pigs', 'Hamsters & Gerbils', 'Reptiles (Turtles, Snakes, Lizards)', 'Horses & Ponies', 'Goats & Sheep', 'Chickens & Poultry', 'Cattle', 'Pigs', 'Other Pets']],
                'breed' => ['type' => 'text', 'label' => 'Breed'],
                'age' => ['type' => 'text', 'label' => 'Age (months/years)'],
                'gender' => ['type' => 'select', 'label' => 'Gender', 'options' => ['Male', 'Female', 'Unknown']],
                'vaccinated' => ['type' => 'select', 'label' => 'Vaccinated', 'options' => ['Yes', 'No', 'Partial']],
                'dewormed' => ['type' => 'select', 'label' => 'Dewormed', 'options' => ['Yes', 'No', 'Unknown']],
                'neutered_spayed' => ['type' => 'select', 'label' => 'Neutered/Spayed', 'options' => ['Yes', 'No', 'Unknown']],
                'microchipped' => ['type' => 'select', 'label' => 'Microchipped', 'options' => ['Yes', 'No']],
                'registration_papers' => ['type' => 'select', 'label' => 'Registration Papers (Kennel Club, etc.)', 'options' => ['Yes', 'No']],
                'health_guarantee' => ['type' => 'text', 'label' => 'Health Guarantee (days)']
            ],
            'pet_supplies' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Pet Food (Dry)', 'Pet Food (Wet)', 'Treats & Chews', 'Bowls & Feeders', 'Pet Beds & Furniture', 'Crates & Carriers', 'Collars & Leashes', 'Harnesses', 'Clothing & Accessories', 'Toys (Dogs)', 'Toys (Cats)', 'Aquarium Tanks & Filters', 'Fish Food & Supplies', 'Bird Cages & Accessories', 'Small Animal Habitats', 'Grooming Supplies', 'Litter Boxes & Litter', 'Training Aids', 'Pet Gates & Playpens', 'Pet Supplements & Medicine', 'Pet Cleaning Supplies']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New (Sealed)', 'Brand New (Unsealed)', 'Used - Good', 'Expired (for food)']],
                'expiry_date' => ['type' => 'date', 'label' => 'Expiry Date (for food/supplements)'],
                'size' => ['type' => 'text', 'label' => 'Size (kg, g, lbs, dimensions)'],
                'pet_size' => ['type' => 'select', 'label' => 'Recommended Pet Size', 'options' => ['Small', 'Medium', 'Large', 'Extra Large', 'All Sizes']]
            ],
            'agriculture_farming' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Farm Equipment & Machinery', 'Tractors & Attachments', 'Harvesters', 'Irrigation Systems', 'Greenhouses & Tunnels', 'Fencing & Gates', 'Livestock Equipment', 'Poultry Equipment (Cages, Feeders, Drinkers)', 'Incubators', 'Animal Feed', 'Fertilizers', 'Seeds & Seedlings', 'Pesticides & Herbicides', 'Fungicides', 'Soil & Amendments', 'Fruit Trees', 'Vegetable Plants', 'Fish Farming (Aquaculture)', 'Honey & Beekeeping', 'Farm Buildings & Sheds', 'Storage Silos', 'Water Pumps']],
                'brand' => ['type' => 'text', 'label' => 'Brand/Manufacturer'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Like New', 'Used - Good', 'Used - Fair', 'For Repair/Spare Parts']],
                'capacity' => ['type' => 'text', 'label' => 'Capacity (Liters, kg, acres, etc.)'],
                'power_type' => ['type' => 'text', 'label' => 'Power Type (Manual, Electric, Diesel, Solar)'],
                'certification' => ['type' => 'text', 'label' => 'Certification (Organic, NAFDAC, etc.)']
            ],
            'industrial_tools' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Construction Equipment', 'Excavators', 'Backhoes', 'Bulldozers', 'Cranes & Lifts', 'Concrete Equipment', 'Power Tools (Drills, Saws, Grinders)', 'Hand Tools (Hammers, Wrenches, Screwdrivers)', 'Measuring & Layout Tools', 'Welding Equipment', 'Air Compressors & Pneumatic Tools', 'Generators (Industrial)', 'Pressure Washers', 'Scaffolding & Ladders', 'Safety Gear & PPE (Helmets, Vests, Gloves, Boots)', 'Workbenches & Storage', 'Material Handling (Pallet Jacks, Forklifts)', 'Cleaning Equipment (Industrial)', 'Woodworking Machinery', 'Metalworking Machinery']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Like New', 'Used - Good', 'Used - Fair', 'For Parts/Repair', 'Refurbished']],
                'power_source' => ['type' => 'text', 'label' => 'Power Source (Electric, Battery, Petrol, Diesel, Pneumatic, Manual)'],
                'weight' => ['type' => 'text', 'label' => 'Weight (kg)'],
                'warranty_months' => ['type' => 'number', 'label' => 'Warranty (months)'],
                'certification' => ['type' => 'text', 'label' => 'Safety/Industry Certification (CE, ISO, etc.)']
            ],
            'office_equipment' => [
                'category' => ['type' => 'select', 'label' => 'Category', 'options' => ['Office Desks & Tables', 'Office Chairs', 'Filing Cabinets', 'Bookcases & Shelving', 'Office Partitions', 'Reception Furniture', 'Conference Tables', 'Breakroom Furniture', 'Printers & Scanners', 'Photocopiers', 'Projectors & Screens', 'Whiteboards & Bulletin Boards', 'Shredders', 'Laminators & Binding Machines', 'Telephone Systems', 'Cash Registers & POS Systems', 'Security Safes', 'Office Supplies (Paper, Pens, Staplers)', 'Shipping & Mailing Supplies']],
                'brand' => ['type' => 'text', 'label' => 'Brand'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Like New', 'Used - Good', 'Used - Fair']],
                'material' => ['type' => 'text', 'label' => 'Material (Wood, Metal, Plastic, Glass)'],
                'dimensions' => ['type' => 'text', 'label' => 'Dimensions (L x W x H in cm)'],
                'color_finish' => ['type' => 'text', 'label' => 'Color / Finish']
            ],
            'services' => [
                'service_category' => ['type' => 'select', 'label' => 'Service Category', 'options' => ['Cleaning & Housekeeping', 'Cooking & Catering', 'Event Planning & Decoration', 'Photography & Videography', 'Videography & Editing', 'Makeup & Beauty Services', 'Hair Styling & Braiding', 'Barbing & Barber Services', 'Nail & Spa Services', 'Massage Therapy', 'Personal Training & Fitness', 'Tutoring & Lessons (Academic, Music, etc.)', 'Language Lessons', 'IT & Tech Support', 'Web Design & Development', 'Graphic Design', 'Digital Marketing & SEO', 'Content Writing & Copywriting', 'Video Editing & Animation', 'Translation & Transcription', 'Legal Services', 'Accounting & Tax Services', 'Business Consulting', 'Career Coaching', 'Real Estate Agent Services', 'Property Management', 'Moving & Hauling Services', 'Logistics & Delivery', 'Car Repair & Mechanics', 'Auto Body & Painting', 'Electrical Services', 'Plumbing Services', 'Carpentry & Furniture Making', 'Painting & Decorating', 'Landscaping & Gardening', 'Pest Control', 'Security Services', 'Nanny & Childcare', 'Elderly Care', 'Pet Sitting & Dog Walking', 'Laundry & Dry Cleaning', 'Tailoring & Alterations', 'Shoe Repair', 'Phone & Gadget Repair', 'Appliance Repair', 'Computer Repair', 'AC & Refrigerator Repair']],
                'service_type' => ['type' => 'select', 'label' => 'Service Type', 'options' => ['One-time Service', 'Recurring (Weekly/Monthly)', 'Contract Basis', 'Hourly Rate', 'Project Based']],
                'availability' => ['type' => 'text', 'label' => 'Availability (Days/Hours)'],
                'delivery_available' => ['type' => 'select', 'label' => 'Delivery Available (For physical services)', 'options' => ['Yes - Free', 'Yes - Paid', 'No (Client comes to me)', 'Remote Only']],
                'years_experience' => ['type' => 'number', 'label' => 'Years of Experience'],
                'certifications' => ['type' => 'text', 'label' => 'Certifications / Licenses'],
                'portfolio_available' => ['type' => 'select', 'label' => 'Portfolio/Previous Work Available', 'options' => ['Yes', 'No']]
            ],
            'jobs' => [
                'job_title' => ['type' => 'text', 'label' => 'Job Title', 'required' => true],
                'company_name' => ['type' => 'text', 'label' => 'Company Name', 'required' => true],
                'job_type' => ['type' => 'select', 'label' => 'Job Type', 'options' => ['Full-Time', 'Part-Time', 'Contract', 'Remote', 'Hybrid', 'Internship', 'Freelance', 'Volunteer', 'Temporary', 'Commission-Based', 'Shift Work']],
                'experience_level' => ['type' => 'select', 'label' => 'Experience Level', 'options' => ['Entry Level (0-1 year)', 'Junior (1-3 years)', 'Mid-Level (3-5 years)', 'Senior (5-8 years)', 'Lead (8-10 years)', 'Manager', 'Director/Executive', 'Intern/Student', 'No Experience Required']],
                'qualification' => ['type' => 'text', 'label' => 'Minimum Qualification (e.g., B.Sc, HND, OND, SSCE, MBA)'],
                'field_of_study' => ['type' => 'text', 'label' => 'Preferred Field of Study'],
                'salary_range' => ['type' => 'text', 'label' => 'Salary Range (e.g., ₦100k - ₦150k/month)'],
                'application_deadline' => ['type' => 'date', 'label' => 'Application Deadline'],
                'gender_preference' => ['type' => 'select', 'label' => 'Gender Preference', 'options' => ['Male', 'Female', 'Any']],
                'age_range' => ['type' => 'text', 'label' => 'Age Range (e.g., 22-35)'],
                'location_requirement' => ['type' => 'text', 'label' => 'Location Requirement (City/State/Remote)'],
                'is_urgent' => ['type' => 'select', 'label' => 'Urgent Hiring', 'options' => ['Yes', 'No']],
                'benefits' => ['type' => 'text', 'label' => 'Benefits (Health Insurance, Pension, Housing, etc.)']
            ],
            'free_stuff' => [
                'item_type' => ['type' => 'text', 'label' => 'Item Type'],
                'reason_free' => ['type' => 'select', 'label' => 'Reason for Giving Away', 'options' => ['Donation/Charity', 'Moving/Relocation', 'Decluttering', 'Upgraded', 'Not Working (For parts)', 'Expiring Soon', 'Promotional Sample', 'Excess Inventory']],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New (Unopened)', 'Used - Like New', 'Used - Good', 'Used - Fair', 'Needs Repair', 'For Parts Only']],
                'pickup_required' => ['type' => 'select', 'label' => 'Pickup Required', 'options' => ['Yes (Buyer collects)', 'Yes (I can deliver for fee)', 'No (Free delivery within area)']]
            ],
            'farm_produce' => [
                'produce_type' => ['type' => 'select', 'label' => 'Produce Type', 'options' => ['Vegetables (Tomatoes, Onions, Peppers, Cabbage, etc.)', 'Leafy Greens (Spinach, Lettuce, Ugu, etc.)', 'Fruits (Oranges, Bananas, Mangoes, Pawpaw, etc.)', 'Roots & Tubers (Yam, Cassava, Potatoes, Cocoyam)', 'Grains (Rice, Maize, Millet, Sorghum)', 'Beans & Legumes', 'Nuts & Seeds (Groundnuts, Cashew, Sesame)', 'Spices (Ginger, Turmeric, Pepper, Cloves)', 'Palm Produce (Oil, Kernel, Bunch)', 'Cocoa', 'Coffee', 'Cotton', 'Rubber', 'Timber/Wood', 'Herbs (Medicinal)', 'Mushrooms', 'Honey', 'Eggs (Table eggs, fertilized eggs)', 'Live Chickens (Broilers, Layers, Cockerels)', 'Live Goats & Sheep', 'Live Cattle', 'Fish (Live, Fresh, Smoked)', 'Crayfish & Seafood', 'Snails', 'Grasscutter', 'Rabbit']],
                'harvest_date' => ['type' => 'date', 'label' => 'Harvest Date'],
                'quantity' => ['type' => 'text', 'label' => 'Quantity (kg, tons, crates, bags, pieces)'],
                'organic_certified' => ['type' => 'select', 'label' => 'Organic Certified', 'options' => ['Yes', 'No', 'Transitional']],
                'packaging' => ['type' => 'text', 'label' => 'Packaging Type (Crate, Sack, Basket, Plastic, Box)'],
                'storage_required' => ['type' => 'text', 'label' => 'Storage Required (Ambient, Cold, Frozen)'],
                'delivery_available' => ['type' => 'select', 'label' => 'Delivery Available', 'options' => ['Yes (Within city)', 'Yes (Nationwide)', 'No (Farm pick-up only)']]
            ],
            'building_materials' => [
                'material_type' => ['type' => 'select', 'label' => 'Material Type', 'options' => ['Cement', 'Sand (Sharp sand, Plaster sand)', 'Granite & Gravel', 'Blocks (Concrete, Hollow, Solid)', 'Roofing Sheets (Aluminum, Stone-coated, Zinc)', 'Roofing Accessories (Ridge caps, Valleys, Nails)', 'Ceiling Materials (PVC, POP, Gypsum)', 'Floor Tiles (Ceramic, Porcelain, Vinyl, Marble)', 'Wall Tiles', 'Paints (Emulsion, Gloss, Texture, Satin)', 'Plumbing Materials (Pipes, Fittings, Taps, Sinks, WC)', 'Electrical Materials (Cables, Conduits, Switches, Breakers, Panels)', 'Doors (Wood, Metal, Glass, PVC)', 'Windows (Aluminum, Glass, Louvers)', 'Iron Rods & Rebars', 'Wire Mesh', 'Wood & Lumber (Planks, Plywood, MDF, Hardwood)', 'Glass (Plain, Tempered, Decorative)', 'Adhesives & Sealants', 'Waterproofing Materials', 'Insulation Materials', 'Fencing Materials (Netting, Chain link, Poles)', 'Gates & Railings', 'Bathroom Fixtures', 'Kitchen Cabinets & Countertops', 'Lighting Fixtures', 'Generator & Solar Materials', 'Scaffolding & Formwork']],
                'brand' => ['type' => 'text', 'label' => 'Brand/Manufacturer'],
                'quantity' => ['type' => 'text', 'label' => 'Quantity (Number, Bags, Pieces, Meters, Squares)'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Good', 'Used - Fair', 'Excess/Surplus', 'Damaged (Discounted)']],
                'delivery_available' => ['type' => 'select', 'label' => 'Delivery Available', 'options' => ['Yes (Within city)', 'Yes (Nationwide - extra fee)', 'No (Pickup only)']]
            ],
            'furniture' => [
                'furniture_type' => ['type' => 'select', 'label' => 'Furniture Type', 'options' => ['Sofas & Couches', 'Sectional Sofas', 'Loveseats', 'Armchairs & Accent Chairs', 'Recliners', 'Ottomans & Poufs', 'Coffee Tables', 'End & Side Tables', 'Dining Tables', 'Dining Chairs', 'Bar Stools & Counter Stools', 'Bed Frames', 'Mattresses', 'Bedside Tables', 'Dressers & Chests', 'Wardrobes & Armoires', 'Nightstands', 'Office Desks', 'Office Chairs', 'Bookshelves & Bookcases', 'TV Stands & Entertainment Centers', 'Console Tables', 'Shoe Racks', 'Benches', 'Outdoor Furniture (Patio, Garden, Balcony)', 'Kids Furniture', 'Baby Cribs & Changing Tables', 'Murphy/Wall Beds', 'Storage Cabinets', 'Shelving Units', 'Room Dividers', 'Vanity Tables', 'Kitchen Islands & Carts']],
                'brand' => ['type' => 'text', 'label' => 'Brand (if known)'],
                'material' => ['type' => 'select', 'label' => 'Main Material', 'options' => ['Solid Wood', 'Plywood/Engineered Wood', 'MDF', 'Metal', 'Glass', 'Plastic', 'Rattan/Wicker', 'Upholstery (Fabric, Leather, Velvet)', 'Marble/Stone', 'Concrete', 'Composite']],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New (Unused)', 'Brand New (Floor Model/Display)', 'Used - Like New', 'Used - Good (Minor wear)', 'Used - Fair (Visible wear, functional)', 'Used - Poor (Needs repair/restoration)']],
                'dimensions' => ['type' => 'text', 'label' => 'Dimensions (L x W x H in cm)'],
                'color' => ['type' => 'text', 'label' => 'Color'],
                'assembly_required' => ['type' => 'select', 'label' => 'Assembly Required', 'options' => ['Fully Assembled', 'Partial Assembly', 'Flat Pack (DIY)', 'Disassembled']],
                'delivery_assembly' => ['type' => 'select', 'label' => 'Delivery & Assembly Available', 'options' => ['Yes (Delivery only)', 'Yes (Delivery + Assembly)', 'No (Pickup only)']]
            ],
            'educational_resources' => [
                'resource_type' => ['type' => 'select', 'label' => 'Resource Type', 'options' => ['Textbooks (Primary, Secondary, University)', 'Past Questions & Exam Papers (WAEC, NECO, JAMB, POST-UTME)', 'Study Guides & Revision Materials', 'Workbooks & Practice Books', 'Dictionaries & Thesauruses', 'Children\'s Educational Books', 'Teaching Aids & Flashcards', 'Charts & Posters', 'Laboratory Equipment & Apparatus', 'Science Kits', 'Math Sets & Geometry Kits', 'Maps & Globes', 'Musical Instruments (Educational)', 'Art Supplies for Schools', 'School Furniture (Desks, Chairs, Boards)', 'Stationery in Bulk', 'Computers for Schools', 'Projectors & AV Equipment', 'Language Learning Materials', 'Special Needs Education Materials', 'E-books & Digital Resources (Licenses)', 'Online Course Access']],
                'level' => ['type' => 'select', 'label' => 'Educational Level', 'options' => ['Nursery/Preschool', 'Primary School (Grades 1-6)', 'Junior Secondary (JSS 1-3)', 'Senior Secondary (SSS 1-3)', 'Undergraduate', 'Postgraduate', 'Professional/Adult Education', 'All Levels']],
                'subject' => ['type' => 'text', 'label' => 'Subject/Topic'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New', 'Used - Like New (No writing)', 'Used - Good (Some highlighting/notes)', 'Used - Fair (Worn but complete)', 'Missing Pages (Discounted)']],
                'edition_year' => ['type' => 'text', 'label' => 'Edition / Year Published'],
                'author_publisher' => ['type' => 'text', 'label' => 'Author / Publisher']
            ],
            'events_tickets' => [
                'event_type' => ['type' => 'select', 'label' => 'Event Type', 'options' => ['Concerts & Music Festivals', 'Theatre & Broadway Shows', 'Comedy Shows', 'Sports Events (Football, Basketball, etc.)', 'Conferences & Seminars', 'Workshops & Masterclasses', 'Parties & Club Events', 'Festivals & Cultural Events', 'Art Exhibitions', 'Trade Shows & Expos', 'Networking Events', 'Charity Galas & Fundraisers', 'Weddings (Invitations/Transfers)', 'Private Events', 'Movie Premieres', 'Award Shows', 'Corporate Events']],
                'event_name' => ['type' => 'text', 'label' => 'Event Name', 'required' => true],
                'event_date' => ['type' => 'date', 'label' => 'Event Date', 'required' => true],
                'venue' => ['type' => 'text', 'label' => 'Venue/Location', 'required' => true],
                'ticket_quantity' => ['type' => 'number', 'label' => 'Number of Tickets Available', 'required' => true],
                'ticket_category' => ['type' => 'text', 'label' => 'Ticket Category (VIP, Regular, Early Bird, etc.)'],
                'face_value' => ['type' => 'text', 'label' => 'Face Value (Original Price)'],
                'selling_price' => ['type' => 'text', 'label' => 'Your Selling Price (per ticket)'],
                'delivery_method' => ['type' => 'select', 'label' => 'Ticket Delivery Method', 'options' => ['E-ticket (Email/App)', 'Physical Ticket (Pickup)', 'Physical Ticket (Delivery)', 'Will Call (Name at Venue)']],
                'reason_selling' => ['type' => 'text', 'label' => 'Reason for Selling']
            ],
            'musical_instruments' => [
                'instrument_type' => ['type' => 'select', 'label' => 'Instrument Type', 'options' => ['Guitars (Acoustic, Electric, Bass)', 'Pianos & Keyboards', 'Drums & Percussion (Acoustic Kit, Electronic Kit, Djembe, Conga, Talking Drum)', 'Brass Instruments (Trumpet, Saxophone, Trombone, French Horn)', 'Woodwind Instruments (Flute, Clarinet, Recorder, Oboe)', 'String Instruments (Violin, Viola, Cello, Harp)', 'Orchestral Instruments', 'DJ Equipment (Decks, Controllers, Mixers)', 'Amplifiers & Speakers (Guitar amp, Bass amp, PA)', 'Microphones & Recording Gear', 'Studio Equipment (Audio Interfaces, Monitors, Headphones)', 'Sheet Music & Stands', 'Instrument Accessories (Strings, Reeds, Picks, Drumsticks, Cables)', 'Cases & Gig Bags', 'Pedals & Effects', 'Metronomes & Tuners', 'Band & Orchestra Accessories', 'Music Production Software']],
                'brand' => ['type' => 'text', 'label' => 'Brand (Fender, Yamaha, Roland, Casio, etc.)'],
                'model' => ['type' => 'text', 'label' => 'Model'],
                'condition' => ['type' => 'select', 'label' => 'Condition', 'options' => ['Brand New (Sealed)', 'Brand New (Opened/Display)', 'Used - Mint', 'Used - Good (Normal wear)', 'Used - Fair (Functional with cosmetic issues)', 'Needs Repair/Setup', 'For Parts']],
                'includes_case_bag' => ['type' => 'select', 'label' => 'Includes Case/Gig Bag', 'options' => ['Yes (Hard Case)', 'Yes (Soft Bag)', 'No']],
                'includes_accessories' => ['type' => 'text', 'label' => 'Accessories Included'],
                'year_manufactured' => ['type' => 'number', 'label' => 'Year Manufactured (if known)']
            ]
        ];
    }

    // Get schema for a specific listing type
    public static function getSchemaForType(string $type): array
    {
        return self::getSchemas()[$type] ?? [];
    }
    
    // Get required fields for a listing type
    public static function getRequiredFields(string $type): array
    {
        $schema = self::getSchemaForType($type);
        return array_keys(array_filter($schema, fn($field) => $field['required'] ?? false));
    }

       // Accessor for specific attribute
    public function getAttributeValue($key)
    {
        if (array_key_exists($key, $this->attributes)) {
            return parent::getAttributeValue($key);
        }
        
        return $this->attributes[$key] ?? null;
    }

   

     // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Scopes
    public function scopeOfType($query, string $type)
    {
        return $query->where('listing_type', $type);
    }
    
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInPriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }
}
