SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `products` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `stock` int NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `image`, `title`, `price`, `description`, `category`, `meta_description`, `meta_keywords`, `stock`) VALUES
(1, 'LGmonitor32ML600M-B.png', 'LG 32-Inch 1080p Computer Monitor', 139.99, 'IPS with HDR 10 Compatibility, Black', 'monitors', 'product description', 'product keywords', 10),
(2, 'SAMSUNG27T35F.png', 'SAMSUNG 27-Inch 1080p Computer monitor', 79.99, 'FHD 1080p Computer Monitor, 75Hz, IPS Panel, HDMI, VGA (D-Sub), 3-Sided Border-Less, FreeSync', 'monitors', 'product description', 'product keywords', 10),
(3, 'LG27US500-W.png', 'LG 27-Inch 4K UHD Computer Monitor', 189.99, '4K UHD (3840x2160) HDR10 IPS Borderless Design Reader Mode Flicker Safe Switch App HDMI DisplayPort', 'monitors', 'product description', 'product keywords', 10),
(4, 'LG45GR65DC-B.png', 'LG 45-Inch UltraWide Computer Monitor', 539.99, '32:9 QHD 200Hz 1ms UltraWide Display AMD FreeSync Premium Pro VESA DisplayHDR 600 HDMI', 'monitors', 'product description', 'product keywords', 10),
(5, 'ASUSROGStrixG16.png', 'ASUS ROG Strix G16', 1099.99, '165Hz Display, NVIDIA® GeForce RTX™ 4060, Intel Core i7-13650HX, 16GB DDR5, 1TB PCIe Gen4 SSD', 'laptops', 'product description', 'product keywords', 10),
(6, 'ASUSROGStrixScar18.png', 'ASUS ROG Strix Scar 18', 3399.99, 'Nebula HDR 16:10 QHD 240Hz/3ms, GeForce RTX™ 4090, Intel® Core™ i9-14900HX, 32GB DDR5-5600, 2TB PCIe SSD', 'laptops', 'product description', 'product keywords', 10),
(7, 'ASUSROGStrixScar15.png', 'ASUS ROG Strix Scar 15', 1399.99, 'Gaming Laptop, 15.6” 300Hz IPS FHD Display, NVIDIA GeForce RTX 3070 Ti,Intel Core i9 12900H, 16GB DDR5, 1TB SSD', 'laptops', 'product description', 'product keywords', 10),
(8, 'AcerNitroV.png', 'Acer Nitro V Gaming Laptop', 699.99, 'Intel Core i7-13620H Processor, NVIDIA GeForce RTX 4050 Laptop GPU, 15.6" FHD IPS 144Hz Display, 16GB DDR5, 512GB Gen 4 SSD', 'laptops', 'product description', 'product keywords', 10),
(9, 'ASUSROGG13CH.png', 'ASUS ROG G13CH gaming PC', 1239.99, 'ntel® Core™ i7-14700F, NVIDIA® GeForce RTX™ 4060 Dual, 1TB NVMe™ PCIe® Gen4 SSD, 16GB DDR5 RAM', 'desktops', 'product description', 'product keywords', 10),
(10, 'BlackoutGamingRX580.png', 'Blackout Computers Gaming Desktop PC Computer', 599.99, 'Intel Core i7 3.6 GHz up to 4.0 GHz,AMD Radeon RX 580 8G GDDR5,16GB RAM,1TB NVME SSD', 'desktops', 'product description', 'product keywords', 10),
(11, 'CyberPowerPCRTX4060.png', 'CyberPowerPC Gamer Xtreme VR Gaming PC', 879.99, 'Intel Core i5-13400F 2.5GHz, GeForce RTX 4060 8GB, 16GB DDR5, 1TB PCIe Gen4 SSD', 'desktops', 'product description', 'product keywords', 10),
(12, 'iBUYPOWERSlate8.png', 'iBUYPOWER Slate 8 MESH Gaming PC Computer Desktop', 1479.99, 'Intel Core i7 14700F CPU, NVIDIA GeForce RTX 4070 Super 12GB GPU, 16GB DDR5 Non-RGB 5200MHz RAM, 2TB NVMe', 'desktops', 'product description', 'product keywords', 10),
(13, 'CorsairK70Cherry.png', 'Corsair K70 RGB PRO Wired Mechanical Gaming Keyboard', 45.99, 'Cherry MX RGB Red Switches: Linear and Fast, 8,000Hz Hyper-Polling', 'keyboards', 'product description', 'product keywords', 10),
(14, 'LogitechG213.png', 'Logitech G213 Prodigy Gaming Keyboard', 35.99, 'LIGHTSYNC RGB Backlit Keys, Spill-Resistant, Customizable Keys, Dedicated Multi-Media Keys, Black', 'keyboards', 'product description', 'product keywords', 10),
(15, 'SteelSeriesApex3.png', 'SteelSeries Apex 3 RGB Gaming Keyboard', 59.99, '10-Zone RGB Illumination, IP32 Water Resistant, Premium Magnetic Wrist Rest (Whisper Quiet Gaming Switch)', 'keyboards', 'product description', 'product keywords', 10),
(16, 'RedragonK668.png', 'Redragon K668 RGB Gaming Keyboard', 25.99, '104 Keys + Extra 4 Hotkeys Wired Mechanical Keyboard w/Sound Absorbing Foams, Upgraded Hot-swappable Socket, Mixed Color Keycaps, Red Switch', 'keyboards', 'product description', 'product keywords', 10);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;