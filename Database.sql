-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: aagl86g0p20e9o.cxducozmif1i.us-east-1.rds.amazonaws.com    Database: japan
-- ------------------------------------------------------
-- Server version 5.6.27-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AttractionReviews`
--

DROP TABLE IF EXISTS `AttractionReviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AttractionReviews` (
  `reviewId` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(1) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `comment` text,
  `attractionId` int(11) NOT NULL,
  PRIMARY KEY (`reviewId`),
  KEY `attractionId` (`attractionId`),
  CONSTRAINT `attractionreviews_ibfk_1` FOREIGN KEY (`attractionId`) REFERENCES `Attractions` (`attractionId`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AttractionReviews`
--

LOCK TABLES `AttractionReviews` WRITE;
/*!40000 ALTER TABLE `AttractionReviews` DISABLE KEYS */;
INSERT INTO `AttractionReviews` VALUES (18,5,'Jonathan Sudiaman','sudiamanj@wit.edu','Absolutely delicious.',6),(19,3,'Barack Obama','president@whitehouse.gov','So-so.',6),(20,1,'Rocky Balboa','balboar@wit.edu','I wouldn\'t spend my prize money here.',6),(21,5,'Santa Claus','clauss@wit.edu','Ho ho ho!',6),(22,4,'Donald Trump','trumpd@wit.edu','I would not build a wall around this tower.',8),(23,4,'Easter Bunny','bunnye@wit.edu','They\'re good, but they didn\'t let me lay my eggs here :(',6),(24,1,'Hillary Clinton','clintonh@wit.edu','I tried emailing the owners, but they just deleted it.',6),(25,2,'Genghis Khan','khang@wit.edu','Was not too great, they didn\'t let me conquer the place.',1),(26,1,'Mr. T','tmr@wit.edu','I PITY THE FOOL WHO GOES TO THIS MUSEUM',1),(27,4,'IGN','ign@wit.edu','4/5 too much gold',5),(28,1,'Alice Adams','alice.adams@isuck.com','I had an awful time.',7),(29,5,'Mitt Romney','romneym@wit.edu','I would put this in my binders.',6),(30,5,'Romeo','romeo@icool.com','I had a great time here with Juliet!',3),(31,4,'aaa','abc@def','test',3);
/*!40000 ALTER TABLE `AttractionReviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Attractions`
--

DROP TABLE IF EXISTS `Attractions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Attractions` (
  `attractionId` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `photourl` text,
  `shortDesc` text,
  `longDesc` text NOT NULL,
  `city` text,
  `gPlaceId` text,
  PRIMARY KEY (`attractionId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Attractions`
--

LOCK TABLES `Attractions` WRITE;
/*!40000 ALTER TABLE `Attractions` DISABLE KEYS */;
INSERT INTO `Attractions` VALUES (1,'Pearl Museum','imageattraction/pearl.jpg','Among the biggest city Kobe is a very beautiful place in Japan. Pearl Museum within the Tasaki Pearl head office is a very beautiful place you can enjoy. Pearl and diamond monument displays worth billions of yen at market price.','Among the biggest city Kobe is a very beautiful place in Japan. Pearl Museum within the Tasaki Pearl head office is a very beautiful place you can enjoy. Pearl and diamond monument displays worth billions of yen at market price.','Kobe','ChIJaUVcM_iOAGARXYX09EnzFSo'),(3,'Romantic cruising','imageattraction/ship1.jpg','Romantic cruising toward the Akashi Kaikyo Bridge. On the ship you can enjoy dishes served on iron plates, as well as nouvelle chinois based on the Cantonese cuisine arranged in a unique way by Executive Chef Chung Chik Wing. A native of Hong Kong, he is certified as a Chinese Great Cooking Teacher, which is the highest title in the Chinese culinary field.','Romantic cruising toward the Akashi Kaikyo Bridge. On the ship you can enjoy dishes served on iron plates, as well as nouvelle chinois based on the Cantonese cuisine arranged in a unique way by Executive Chef Chung Chik Wing. A native of Hong Kong, he is certified as a Chinese Great Cooking Teacher, which is the highest title in the Chinese culinary field.','Kobe','ChIJ5wy9gACPAGARTVXuOMOEYq8'),(4,'Tallest Skyscraper','imageattraction/tokyo1.jpg','\"Yokohama Minato Mirai\" is a pleasant place to visit during the day to enjoy some shipping or a stroll, but we also recommend the lovely view at night after sunset. Japan\'s tallest skyscraper, \"Landmark Tower\" and the Ferris Wheel are the star attractions making this nightscape spot one of the best in the Tokyo metropolitan area.','\"Yokohama Minato Mirai\" is a pleasant place to visit during the day to enjoy some shipping or a stroll, but we also recommend the lovely view at night after sunset. Japan\'s tallest skyscraper, \"Landmark Tower\" and the Ferris Wheel are the star attractions making this nightscape spot one of the best in the Tokyo metropolitan area.','Yokohama','ChIJ8yxNol1cGGARTWLvxNVT9DU'),(5,'Golden Pavilion','imageattraction/golden.jpg','Golden Pavilion (Kinkaku) is the most famous temple in Kyoto and probably Japan. Golden Pavilion is literally covered in gold leaf and is surround by beautiful Japanese gardens. Golden Pavilion is designated as a \"Special Place of Scenic Beauty\" and is a UNESCO World Heritage Site and forms part of the \"Historic Monuments of Ancient Kyoto\".','Golden Pavilion (Kinkaku) is the most famous temple in Kyoto and probably Japan. Golden Pavilion is literally covered in gold leaf and is surround by beautiful Japanese gardens. Golden Pavilion is designated as a \"Special Place of Scenic Beauty\" and is a UNESCO World Heritage Site and forms part of the \"Historic Monuments of Ancient Kyoto\".','Kyoto','ChIJvUbrwCCoAWARX2QiHCsn5A4'),(6,'Fuunji Ramen','imageattraction/fuunji.jpeg','The soup at Fuunji is laced with chunks of pork, and a pile of smoked fish powder sits on top. The Japanese employ a lot of dried and smoked fish in their cuisine, and many tsukemen shops garnish their soup with a sheet of nori and a spoonful of fish powder. The diner mixes the powder in, adding a massive flavor punch. The broth here is predominantly chicken based, and it doesn\'t weigh you down as much as its 100 percent pork brethren. With its consistently delicious broth and perfectly chewy noodles, Fuunji is a no-brainer.','The soup at Fuunji is laced with chunks of pork, and a pile of smoked fish powder sits on top. The Japanese employ a lot of dried and smoked fish in their cuisine, and many tsukemen shops garnish their soup with a sheet of nori and a spoonful of fish powder. The diner mixes the powder in, adding a massive flavor punch. The broth here is predominantly chicken based, and it doesn\'t weigh you down as much as its 100 percent pork brethren. With its consistently delicious broth and perfectly chewy noodles, Fuunji is a no-brainer.','Tokyo','ChIJ508frs-MGGARnIKrb_tkai0'),(7,'Senso-ji','imageattraction/sensoji.jpeg','Senso-ji is an ancient Buddhist temple located in Asakusa, Tokyo, Japan. It is Tokyo\'s oldest temple, and one of its most significant. Formerly associated with the Tendai sect of Buddhism, it became independent after World War II. Adjacent to the temple is a Shinto shrine, the Asakusa Shrine.','Senso-ji is an ancient Buddhist temple located in Asakusa, Tokyo, Japan. It is Tokyo\'s oldest temple, and one of its most significant. Formerly associated with the Tendai sect of Buddhism, it became independent after World War II. Adjacent to the temple is a Shinto shrine, the Asakusa Shrine.<br><br>The temple is dedicated to the bodhisattva Kannon (Avalokitesvara). According to legend, a statue of the Kannon was found in the Sumida River in 628 by two fishermen, the brothers Hinokuma Hamanari and Hinokuma Takenari. The chief of their village, Hajino Nakamoto, recognized the sanctity of the statue and enshrined it by remodeling his own house into a small temple in Asakusa so that the villagers could worship Kannon.','Tokyo','ChIJ8T1GpMGOGGARDYGSgpooDWw'),(8,'Tokyo Tower','imageattraction/tokyotower.png','Tokyo Tower is a communications and observation tower in the Shiba-koen district of Minato, Tokyo, Japan. At 332.9 metres (1,092 ft), it is the second-tallest structure in Japan. The structure is an Eiffel Tower-inspired lattice tower that is painted white and international orange to comply with air safety regulations.','Tokyo Tower is a communications and observation tower in the Shiba-koen district of Minato, Tokyo, Japan. At 332.9 metres (1,092 ft), it is the second-tallest structure in Japan. The structure is an Eiffel Tower-inspired lattice tower that is painted white and international orange to comply with air safety regulations.<br><br>Built in 1958, the tower\'s main sources of revenue are tourism and antenna leasing. Over 150 million people have visited the tower. FootTown, a four-story building directly under the tower, houses museums, restaurants and shops. Departing from there, guests can visit two observation decks. The two-story Main Observatory is at 150 metres (490 ft), while the smaller Special Observatory reaches a height of 249.6 metres (819 ft).','Tokyo','ChIJcx2EkL2LGGARv0gV3HSFqQo');
/*!40000 ALTER TABLE `Attractions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoteldetails`
--

DROP TABLE IF EXISTS `hoteldetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoteldetails` (
  `ID` int(8) NOT NULL,
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `City` text NOT NULL,
  `Phone` text NOT NULL,
  `Price` double NOT NULL,
  `Rate` int(5) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  `PhotoM` text NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoteldetails`
--

LOCK TABLES `hoteldetails` WRITE;
/*!40000 ALTER TABLE `hoteldetails` DISABLE KEYS */;
INSERT INTO `hoteldetails` VALUES (1,'shiraume','address 1','kyoto','81 755611459',200,5,35,135.77,'hotelImg/1.jpg','The area where the Shiraume Ryokan is located is one of the most beautiful and historical areas in Kyoto, the Gion district. Gion, day and night, is still very much a living world of elegant and traditional sophistication, charms and mysteries. Here the geiko and maiko (apprentice geiko) live, study and work against a backdrop of old cherry and willow trees along the Shirakawa Stream and the polished grand wooden facades of Hanamikoji and the many fascinating back lanes.'),(2,'The Ritz-Carlton','Kamogawa Nijo-Ohashi Hotori Hokodencho Nakagyo WardKyoto Prefecture','Kyoto','81 757465555',662,5,35.013958,135.772279,'hotelImg/2.jpg','The Ritz-Carlton, Kyoto, the first luxury urban resort in Japan, sits on the banks of the Kamogawa river, with sweeping views of the famous Higashiyama mountains. The resort features 134 guest rooms with traditional Japanese motifs, four restaurants and bars including modern Japanese cuisine and a spa for the ultimate rejuvenation.'),(3,'Hotel Mystays Kyoto Shijo','some other address of hotel.','Kyoto','81 752833939',159,4,35.004116,135.754083,'hotelImg/3.jpg','Enjoy our hotel\'s modern Japanese design as you explore the historic capital. We are located in the heart of Kyoto, with easy access to all major tourist destinations. Step outside and it\'s only a short walk to Nijo Castle or Yasaka Shrine. Step inside and take in an undeniably Japanese, yet modern, decor. Perhaps that\'s why we\'ve received TripAdvisor\'s Certificate of Excellence annually since 2011.'),(4,'Ryokan Sawanoya','2 Chome-3-11 Yanaka','Tokyo','81 338222251',42,4,35.720936,139.764824,'hotelImg/4.jpg','Located in \"Shitamachi\" of Tokyo where the traditional folksy life style is still preserved, our Inn gives you the unusual opportunity to see and interact with a real neighborhood. we are close to Ueno Park,museums,concert hall.'),(5,'The Tokyo Station Hotel','1 Chome-9-1 Marunouchi, Chiyoda-ku','Tokyo','81 352201111',423,5,35.681264,139.766007,'hotelImg/5.jpg','An iconic landmark in the heart of the city, The Tokyo Station Hotel’s majestic red-brick building exudes a timeless elegance befitting its deep rooted heritage. The 150 luxuriously appointed rooms and suites, most with panoramic views of the Imperial Palace Gardens and the Marunouchi cityscape, raise the bar for exclusivity and sophistication. Guests are well-connected as this Central Tokyo hotel is primely located right inside Tokyo Station building and is enticingly-close to a bevy of the most popular attractions and places of interest in and around Tokyo. Above all, it is the impeccable service at The Tokyo Station Hotel that makes your stay extraordinary and remarkable. Book a stay at The Tokyo Station Hotel and experience Omotenashi – genuine Japanese hospitality at its finest.'),(6,'Hilton Osaka','1 Chome-8-8 Umeda, Kita-ku','Osaka','81 663477111',192,4,34.699895,135.4959,'hotelImg/6.jpg','See the city from your room at Hilton Osaka. Across from the city’s main station and Grand Front Osaka Mall, we are ideally situated for all your travel needs. This hotel provides easy access to the airport, rail system and tourist spots. Our hotel offers various on-site dining options, an indoor pool, fitness center and a relaxation salon. Large and bright guest rooms provide a retreat from the busy city.');
/*!40000 ALTER TABLE `hoteldetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotels` (
  `ID` int(8) NOT NULL,
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `City` text NOT NULL,
  `Phone` text NOT NULL,
  `Photo` text NOT NULL,
  `Price` double NOT NULL,
  `Rate` int(5) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (1,'Shiraume','some street 2410982041','Kyoto','81 755611459','hotelImg/1.jpg',200,5,35,135.77),(2,'The Ritz-Carlton','Kamogawa Nijo-Ohashi Hotori Hokodencho Nakagyo WardKyoto Prefecture','Kyoto','81 757465555','hotelImg/2.jpg',662,5,35.013958,135.772279),(3,'Hotel Mystays Kyoto Shijo','some other address of hotel.','Kyoto','81 752833939','hotelImg/3.jpg',159,4,35.004116,135.754083),(4,'Ryokan Sawanoya','2 Chome-3-11 Yanaka','Tokyo','81 338222251','hotelImg/4.jpg',42,4,35.720936,139.764824),(5,'The Tokyo Station Hotel','1 Chome-9-1 Marunouchi, Chiyoda-ku','Tokyo','81 352201111','hotelImg/5.jpg',423,5,35.681264,139.766007),(6,'Hilton Osaka','1 Chome-8-8 Umeda, Kita-ku','Osaka','81 663477111','hotelImg/6.jpg',192,4,34.699895,135.4959);
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-20 21:11:39
