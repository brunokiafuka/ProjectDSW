-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2016 at 02:27 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buntingmovies`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE IF NOT EXISTS `actor` (
  `actor_id` int(11) NOT NULL AUTO_INCREMENT,
  `actor_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `actor_age` int(11) NOT NULL,
  `actor_movieNumber` int(11) NOT NULL,
  `actor_img` varchar(1000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`actor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actor_id`, `actor_name`, `actor_age`, `actor_movieNumber`, `actor_img`) VALUES
(2, 'Arnold Schwarzenegger', 69, 40, 'Arnold_Schwarzenegger_by_Gage_Skidmore.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `ip_Add` varchar(25) COLLATE utf8_bin NOT NULL,
  `movie_img` varchar(50) COLLATE utf8_bin NOT NULL,
  `movie_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_amt` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `movie_id`, `cust_id`, `ip_Add`, `movie_img`, `movie_title`, `qty`, `price`, `total_amt`) VALUES
(9, 10, 5, '0', '3423984.jpg', 'X-Men: Apocalypse', 2, '150.00', '300.00'),
(10, 9, 5, '0', '2810516.jpg', 'Big Driver', 1, '200.00', '200.00'),
(11, 14, 5, '0', '3328890.jpg', 'Deadpool', 2, '140.00', '280.00'),
(12, 24, 5, '0', '243441.jpg', 'Six Days Seven Nights ', 1, '120.00', '120.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_username` varchar(50) COLLATE utf8_bin NOT NULL,
  `cust_password` varchar(9000) COLLATE utf8_bin NOT NULL,
  `cust_name` varchar(75) COLLATE utf8_bin NOT NULL,
  `cust_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `cust_country` varchar(75) COLLATE utf8_bin NOT NULL,
  `cust_city` varchar(75) COLLATE utf8_bin NOT NULL,
  `cust_address` varchar(50) COLLATE utf8_bin NOT NULL,
  `newsletter` varchar(25) COLLATE utf8_bin NOT NULL,
  `conf_code` varchar(1000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_username`, `cust_password`, `cust_name`, `cust_email`, `cust_country`, `cust_city`, `cust_address`, `newsletter`, `conf_code`) VALUES
(3, 'test2', 'c20ad4d76fe97759aa27a0c99bff6710', 'test2', 'test2@mytest.net', '', '', '', '', ''),
(4, 'test3', 'c4ca4238a0b923820dcc509a6f75849b', 'test3', 'test3@mytest.net', '', '', '30 onyx', 'Yes', ''),
(5, 'test4', 'c4ca4238a0b923820dcc509a6f75849b', 'test4', 'test4@mytest.net', 'Angola', '', '30 onyx', 'No', '123456'),
(6, 'test5', 'c4ca4238a0b923820dcc509a6f75849b', 'test5', 'tesrt@mytest.net', 'Angola', 'LDA', '10 Bedford', 'No', ''),
(10, 'brunokiafuka', 'c4ca4238a0b923820dcc509a6f75849b', 'Bruno Kiafuka', 'brunokiafuka@gmail.com', 'Angola', 'LDA', 'JB', 'Yes', ''),
(12, 'daniel', '202cb962ac59075b964b07152d234b70', 'Daniel Kakona', 'danielkakona1@gmail.com', 'Congo', 'KIN', '12 JHB', 'No', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `emp_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `emp_cat` int(11) NOT NULL,
  `emp_password` varchar(9000) COLLATE utf8_bin NOT NULL,
  `emp_verfication_numb` varchar(9000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_email`, `emp_cat`, `emp_password`, `emp_verfication_numb`) VALUES
(1, 'test', '', 0, '1', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `employeecate`
--

CREATE TABLE IF NOT EXISTS `employeecate` (
  `emp_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`emp_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employeecate`
--

INSERT INTO `employeecate` (`emp_cat_id`, `description`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `movie_price` decimal(10,2) NOT NULL,
  `movie_genre` varchar(25) COLLATE utf8_bin NOT NULL,
  `actor_id` int(11) NOT NULL,
  `movie_year` int(11) NOT NULL,
  `movie_keywords` text COLLATE utf8_bin NOT NULL,
  `movie_image` varchar(50) COLLATE utf8_bin NOT NULL,
  `movie_description` text COLLATE utf8_bin NOT NULL,
  `movie_type` varchar(75) COLLATE utf8_bin NOT NULL,
  `movie_stock` int(15) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=49 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `movie_price`, `movie_genre`, `actor_id`, `movie_year`, `movie_keywords`, `movie_image`, `movie_description`, `movie_type`, `movie_stock`) VALUES
(6, 'Predator ', '125.00', 'Action', 1, 1987, 'Arnold  arnold predator action ', '1116075.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Arnold Schwarzenegger blows the screen apart as the commanding officer of an elite military unit sent to the Central American jungle on a rescue mission. But Schwarzenegger and his team soon have bigger problems to contend with when they realize they''re being stalked by a bloodthirsty extraterrestrial hunter that uses advanced alien technology&#9472;including the ability to render himself all but invisible&#9472;to pick them off one by one. Carl Weathers, Jesse Ventura, Bill Duke also star. 107 min. Widescreen (Enhanced); Soundtracks: English Dolby 5.1, DTS, Dolby Surround, French Dolby Surround; Subtitles: English, Spanish; theatrical trailer.</span></p>', 'Bluray', 100),
(7, 'The Expendables 3', '125.00', 'Action', 1, 2014, 'Harrison Ford dvd arnold stalone sylvester 2014 Gramme action', '2787679.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">In their third action-packed outing, Sylvester Stallone (who also co-wrote), Jason Statham, and the rest of their fellow soldiers-for-hire are once again up to their necks in explosive danger. This time, they gear up for their most personal fight yet as they try to take down a ruthless gunrunner (Mel Gibson) who years ago co-founded the mercenary team with Sly before betraying him. Antonio Banderas, Jet Li, Wesley Snipes, Kelsey Grammer, Arnold Schwarzenegger, and Harrison Ford also star. 126 min. Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, Spanish Dolby Digital 5.1, DVS; Subtitles: English, Spanish.</span></p>', 'DVD', 75),
(8, 'She''s Out of My League', '77.99', 'Comedy', 1, 2010, 'comedy nerdy out of my league funny lol girlfriend ', '2109981.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">A nerdy airport security guard (Jay Baruchel) shocks his friends, family, ex-girlfriend, and, most of all, himself when he begins dating a stunningly beautiful and successful young woman (Alice Eve). If Baruchel can get past the notion that he''s not good enough for Eve, he might just realize that he''s exactly the kind of nice guy she''s looking for. T.J. Miller, Mike Vogel, Nate Torrence, Lindsay Sloane also star in this raucous romantic comedy. 104 min. Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, French Dolby Digital 5.1, Spanish Dolby Digital 5.1; Subtitles: English, French, Spanish; audio commentary; featurette; deleted scenes; bloopers; extended ending.</span></p>', 'DVD', 50),
(9, 'Big Driver', '200.00', 'Action', 1, 2014, 'Big Driver action 2014 stephen thriller ', '2810516.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Stephen King''s unsettling novella from "Full Dark, No Stars" comes to the screen in this gripping Lifetime telefilm, in which a famous writer (Maria Bello) finds herself stranded by the side of a New England road after a tire blowout. She is grateful for the help she receives from another driver passing by...until she comes face to face with the grisly truth about him. Will Harris, Olympia Dukakis, and Joan Jett co-star. 90 min. Widescreen (Enhanced); Soundtrack: English Dolby Digital 5.1; Subtitles: English (SDH).</span></p>', 'DVD', 10),
(10, 'X-Men: Apocalypse', '150.00', 'Action', 1, 2016, 'x-men action apocalypse ', '3423984.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">In 1983, the ancient mutant En Sabah Nur (Oscar Isaac) awakens after thousands of years, ready to remake civilization by first destroying it. Recruiting four powerful mutants--including Magneto (Michael Fassbender)--to serve as his horsemen as he brings about his apocalypse, En Sabah Nur finds his plan challenged by Charles Xavier (James McAvoy) and his team of young, would-be heroes. Jennifer Lawrence, Rose Byrne, Nicholas Hoult, Tye Sheridan, Sophie Turner, Evan Peters also star. 144 min. Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, Spanish Dolby Digital Surround, French Dolby Digital Surround; Subtitles: English (SDH), Spanish, French; deleted scenes; extended scenes; gag reel; documentary; art gallery; photo gallery; audio commentary by director Bryan Singer, producer Simon Kinberg.</span></p>', 'DVD', 10),
(11, 'The Legend of Tarzan', '200.00', 'Action', 1, 2016, 'tarzan action', '3444521 (1).jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Having returned to his British homeland to claim his noble birthright, John Clayton (Alexander Skarsg&aring;rd)--the man once called Tarzan--had become acclimated to civilization and married life with Jane (Margot Robbie). Invited by Belgium for personal oversight of the Congo&rsquo;s colonization, he&rsquo;ll need all his feral survival skills when he uncovers the true agenda of a treacherous envoy (Christoph Waltz). Vigorous screen re-imagining for Edgar Rice Burroughs&rsquo; jungle lord also stars Samuel L. Jackson, Djimon Hounsou, Jim Broadbent. 110 min. Widescreen; Soundtrack: English; Subtitles: English (SDH); featurettes. Two-disc set.</span></p>', 'DVD', 10),
(12, 'The Neon Demon ', '180.00', 'Action', 1, 2016, 'Neon Demon', '3378661.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Orphaned teenager Jesse (Elle Fanning) moved to Los Angeles, certain that her striking beauty would gain her entry into the world of high-end modeling. While her popularity took off--and she became exposed to every excess the fast lane affords--her ascent didn&rsquo;t go unnoticed by a cabal of catty rivals...and they&rsquo;re out to very literally get a piece of her. Nicolas Winding Refn&rsquo;s glossy, violent, and controversial shocker also stars Jena Malone, Bella Heathcote, Christina Hendricks, and Keanu Reeves. 117 min. Widescreen; Soundtrack: English.</span></p>', 'DVD', 10),
(13, 'Croupier ', '170.00', 'Action', 1, 2016, 'Croupier  action', '3000030.jpg', '<div id="aec-product-description" style="box-sizing: border-box; padding: 0px; resize: none; display: inline-block; float: left; width: 1140px; transition: all 0.3s ease-in-out 0s; color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; margin: 20px 0px 0px !important 0px;">\r\n<div class="aec-desc-review" style="box-sizing: border-box; padding: 0px; margin: 0px; resize: none; font-size: 14px; max-height: 1000px; transition: all 0.3s ease-in-out 0s; overflow: hidden;">A struggling writer (Clive Owen) takes a job as a croupier in a London casino, planning to use his experiences as the basis for a book. As he observes the characters populating the gambling hall, he eventually becomes romantically involved with a beautiful player (Alex Kingston) who lures him into playing a key role in a robbery scheme. Gina McKee, Nick Reding co-star in this atmospheric crime drama from director Mike Hodges ("Get Carter"). 95 min. Widescreen (Enhanced); Soundtrack: English; Subtitles: English.</div>\r\n</div>\r\n<div id="aec-credits-container" style="box-sizing: border-box; padding: 0px; resize: none; display: inline-block; float: left; width: 1140px; transition: all 0.3s ease-in-out 0s; color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; margin: 20px 0px 0px !important 0px;">&nbsp;</div>', 'DVD', 10),
(14, 'Deadpool', '140.00', 'Action', 1, 2016, 'Deadpool action', '3328890.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Snarky special forces vet Wade Wilson (Ryan Reynolds) found a soulmate in escort Vanessa Carlyle (Morena Baccarin), only to have their plans dashed by his diagnosis with terminal cancer. After researchers with a hidden agenda offered treatment through an illicit gene therapy, the process disfigured Wilson...while granting him incredible healing powers. Too bad for his "benefactors" that they don&rsquo;t have the same abilities, as he takes a costumed identity and forces a stunning showdown! Violent&#9472;and very funny&#9472;hit take on Marvel Comics&rsquo; manic "Merc with a Mouth" also stars T.J. Miller, Ed Skrein, Gina Carano, and Leslie Uggams. 108 min. Widescreen; Soundtrack: English.</span></p>', 'DVD', 10),
(15, 'How I Live Now ', '100.00', 'Action', 0, 2013, 'How I Live Now action', '2427063.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Arriving in the English countryside to spend time with relatives in the summer, troubled American teenager Daisy (Saoirse Ronan) bonds with cousin Edmond (George MacKay) only to be separated from him after an atomic blast in London drives society into chaos. As the military takes control of the country, Daisy resolves to find Edmond even if it means venturing out on her own. Based on Meg Rosoff''s 2004 book, this haunting drama co-stars Tom Holland, Anna Chancellor. 101 min. Widescreen (Enhanced); Soundtrack: English Dolby Digital 5.1; Subtitles: English (SDH), Spanish; behind-the-scenes footage; deleted scenes; interviews; "making of" featurettes; theatrical trailer.</span></p>', 'DVD', 10),
(16, 'Nighthawks ', '110.00', 'Action', 1, 1987, 'Nighthawks detectives', '621626.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Streetwise New York City detectives DaSilva (Sylvester Stallone) and Fox (Billy Dee Williams) are transferred to a special task force designed to combat terrorism, in this exciting, action-packed crime drama. Their first assignment puts them up against Wulfgar (Rutger Hauer), a sadistic and merciless international terrorist who''s made the Big Apple his next target. Lindsay Wagner, Persis Khambatta, Nigel Davenport also star. 100 min. Widescreen (Enhanced); Soundtrack: English Dolby Digital Surround; Subtitles: Spanish, French.</span></p>', 'DVD', 10),
(17, 'Hellfighters', '240.00', 'Action', 1, 1968, 'Hellfighters stars in this exciting actioner ', '245605.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">John Wayne stars in this exciting actioner based on the life of famed oil well firefighter Paul "Red" Adair. As fire expert Chance Buckman, the Duke leads a company of men risking their lives battling oil well blazes around the world. After he is injured and hospitalized, Chance''s estranged daughter (Katharine Ross) pays him a visit&#9472;only to fall in love with his closest colleague (Jim Hutton). With Vera Miles, Bruce Cabot. 121 min. Widescreen; Soundtracks: English Dolby Digital Surround, Spanish Dolby Digital mono; Subtitles: French, Spanish.</span></p>', 'DVD', 10),
(18, 'Spectre', '190.00', 'Action', 0, 1960, 'Spectre', '3064680.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">A cryptic message from Bond''s past sends him on a trail to uncover a sinister organization. While M battles political forces to keep the secret service alive, Bond peels back the layers of deceit to reveal the terrible truth behind Spectre. Stars Daniel Craig, Christoph Waltz and Naomie Harris.</span></p>', 'DVD', 10),
(19, 'Shining Through ', '195.00', 'Action', 1, 1984, 'Shining Through ', '683842.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Sweeping World War II romance-thriller stars Melanie Griffith as a secretary who falls in love with her mysterious new boss (Michael Douglas), who she soon discovers is an American intelligence agent who enlists her for some dangerous undercover work behind enemy lines. John Gielgud and Liam Neeson also star. 132 min. Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, Spanish Dolby Digital mono, French Dolby Digital stereo; Subtitles: English, Spanish.</span></p>', 'DVD', 10),
(20, 'Imagine Me & You', '450.00', 'Comedy', 1, 2005, 'Imagine Me & You', '830452.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">What''s a girl to do when, in the middle of her nuptials, she locks eyes with the one she truly wants...and it''s not the groom? And what happens when the person turns out to be another woman? These are the questions faced by a young Londoner (Piper Perabo) who falls for a pretty florist (Lena Headey) and winds up torn between her new husband (Matthew Goode) and the woman she loves. Celia Imrie, Darren Boyd and Anthony Head also star. 93 min. Standard and Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, Spanish Dolby Digital Surround; Subtitles: English, French, Spanish; audio commentary; deleted scenes; extended scenes; more.</span></p>', 'DVD', 10),
(21, 'Gas Pump Girls', '65.00', 'Comedy', 1, 2003, 'Gas Pump Girls Enterprising young ladie', '1987173.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Enterprising young ladies take over a gas station after the owner (uncle to one of the buxom beauties) becomes ill. There''s a fuel crunch on and the gas gals face heavy competition from another station across the street, so they roll up their sleeves&#9472;make that their halter tops&#9472;and get to work providing "full service" to their eager male customers. Kirsten Baker, Linda Lawrence, and Huntz Hall star. 86 min. Widescreen; Soundtrack: English Dolby Digital mono.</span></p>', 'DVD', 10),
(22, 'Bud Abbott & Lou Costello Meet the Monsters Collection', '70.00', 'Comedy', 1, 2006, 'Bud Abbott & Lou Costello Meet the Monsters Collection', '2925760.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Two "private eye school" graduates (Bud Abbott and Lou Costello) are hired by a boxer who''s been framed for murder by a crooked promoter, but it takes a doctor''s invisibility serum and a turn in the ring by Lou to bring the crooks to justice in "Abbott and Costello Meet the Invisible Man" (1951). Arthur Franz, Sheldon Leonard also star. And the boys are American cops working in early-1900s London who find themselves in the middle of a madcap melee after getting mixed up with a mad medico (Boris Karloff) and his monstrous alter ego in "Abbott and Costello Meet Dr. Jekyll and Mr. Hyde" (1953), with Craig Stevens and Helen Westcott. Two-disc set also includes "Abbott and Costello Meet Frankenstein" and "Abbott and Costello Meet the Mummy." 5 1/2 hrs. total. Standard; Soundtrack: English Dolby Digital mono; Subtitles: English (SDH), French, Spanish</span></p>', 'DVD', 10),
(23, 'First Daughter', '300.00', 'Comedy', 1, 2004, 'First Daughter', '690246.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Lighthearted romantic comedy stars Katie Holmes as the rebellious daughter of the U.S. president whose desire to lead an independent life is marred by the Secret Service agents accompanying her to college. After her father thins out the security detail, Holmes finds her burgeoning relationship with a handsome resident advisor may not be what it seems when the young man turns out to be an undercover agent assigned to protect her</span></p>', 'DVD', 10),
(24, 'Six Days Seven Nights ', '120.00', 'Comedy', 1, 2011, 'Six Days Seven Nights ', '243441.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Frothy, picture postcard-pretty comedy/adventure featuring Anne Heche as a magazine editor, on a South Pacific vacation with boyfriend David Schwimmer, who hires local pilot Harrison Ford to fly her to Tahiti for a last-minute photo session. After the plane crashes on a remote island, Heche and Ford''s danger-filled odyssey of survival soon leads to romance. Directed by Ivan Reitman. 102 min. Widescreen; Soundtracks: English Dolby Digital 5.1, French Dolby Digital 5.1; theatrical trailer.</span></p>', 'DVD', 10),
(25, 'The Addams Family: The Complete Series', '123.00', 'Comedy', 0, 2009, 'The Addams Family: The Complete Series', '1150099.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Nine-disc set includes all 64 episodes of the series. **64 episodes on 9 discs. 27 1/3 hrs.*</span></p>', 'DVD', 10),
(26, 'Can''t Buy Me Love ', '124.00', 'Comedy', 1, 1983, 'Can''t Buy Me Love ', '430145.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Funny, charming teen tale of a high school nerd who tries to buy his way into the "in" crowd, even going so far as to hire a popular cheerleader to pose as his girl. Both learn a valuable lesson in the process. Patrick Dempsey, Amanda Peterson, Seth Green star. 94 min. Standard; Soundtrack: English Dolby Digital Surround.</span></p>', 'DVD', 10),
(27, 'She''s Out of My League', '201.00', 'Comedy', 1, 1987, 'She''s Out of My League', '2109981 (1).jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">A nerdy airport security guard (Jay Baruchel) shocks his friends, family, ex-girlfriend, and, most of all, himself when he begins dating a stunningly beautiful and successful young woman (Alice Eve). If Baruchel can get past the notion that he''s not good enough for Eve, he might just realize that he''s exactly the kind of nice guy she''s looking for. T.J. Miller, Mike Vogel, Nate Torrence, Lindsay Sloane also star in this raucous romantic comedy. 104 min. Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, French Dolby Digital 5.1, Spanish Dolby Digital 5.1; Subtitles: English, French, Spanish; audio commentary; featurette; deleted scenes; bloopers; extended ending.</span></p>', 'DVD', 10),
(28, 'Bridget Jones: Edge of Reason', '240.00', 'Comedy', 1, 2004, 'Bridget Jones: Edge of Reason Zellweger reprises her role as the romantically  comedy', '697910.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Ren&eacute;e Zellweger reprises her role as the romantically challenged heroine in this adaptation of Helen Fielding''s frothy follow-up. Four weeks after the first film leaves off, Bridget finds her relationship with her lawyer beau (Colin Firth) put to the test by her jealousy over his sexy young assistant and the sudden reappearance of an ex-boyfriend (Hugh Grant). Jim Broadbent, Gemma Jones, Jacinda Barrett also star. 108 min. Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, French Dolby Digital 5.1, Spanish Dolby Digital 5.1; Subtitles: French, Spanish; deleted scenes; featurettes; interview.</span></p>', 'DVD', 10),
(29, 'American Monsters: Werewolves Wildmen & Sea ', '290.00', 'Documentary', 1, 2003, 'American Monsters: Werewolves Wildmen & Sea  documentry', '2855770.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">You''ve heard the reassuring remark many times: "There''s no such things as monsters." This speculative documentary might just convince you otherwise! Examining the long history of stories surrounding terrifying creatures that prowl the land, sea, and skies, this program presents the research that suggests these tales&#9472;dating back to antiquity&#9472;could have a basis in truth rather than myth. 60 min. Widescreen (Enhanced); Soundtrack: English.</span></p>', 'DVD', 10),
(30, 'Fight for Freedom ', '200.00', 'Documentary', 1, 2010, 'Fight for Freedom documentry', '1707477.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Visit the battlefields of World War II for an in-depth look at some of the most defining events in history. Focusing on the second half of the war, this compelling documentary series chronicles the conflict''s greatest battles&#9472;including the Battle of the Bulge and D-Day&#9472;to reveal how they determined its outcome and aftermath. All 10 programs&#9472;including "The Road to Tokyo," "The Pacific in Flames," "The Battle of Kursk," "The Battle for Germany," and "The Peace of the Atomic Bomb"&#9472;are featured in a two-disc set. 8 3/4 hrs. total. Standard; Soundtrack: English Dolby Digital stereo. 10 programs on 2 discs. 8 3/4 hrs.</span></p>', 'DVD', 10),
(31, 'Haunted History', '201.00', 'Documentary', 1, 2010, 'Haunted History documentry', '2424389.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Two-disc set includes "Ghosts of Gettysburg," "Salem Witch Trials," "Murder Castle," "Lost Souls of Pennhurst," "Katrina Cannibal," "A Deadly Possession," "The Torso Murders," and "The Manson Murders." 6 hrs. total. Widescreen; Soundtrack: English Dolby Digital stereo; Subtitles: English (SDH).</span></p>', 'DVD', 10),
(32, 'The Last Man on the Moon', '159.00', 'Documentary', 1, 2014, 'moon The Last Man on the Moon documentary', '3315089.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">In December 1972, as the crew of Apollo 17 prepared to return to Earth, astronaut Gene Cernan became the last American to stand on the lunar surface. Over 40 years later, the now-octogenarian flight hero finally offers remarkable insights and personal perspectives on his life and service, his missions and colleagues with the space program, and his honest assessments regarding the impact that his career had upon his family. 95 min. Widescreen; Soundtrack: English Dolby Digital 5.1; Subtitles: English (SDH); featurettes.</span></p>', 'DVD', 100),
(33, 'Ancient Mysteries of the Lost World ', '450.00', 'Documentary', 1, 2010, 'Ancient Mysteries of the Lost World documentry', '2879400.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Was there such a place as Atlantis? Does it still exist? Were the pyramids of Giza arranged to resemble the constellation of Orion...and, if so, why? Who are the "Merry Maidens"? This documentary production investigates some of the ancient world''s most enduring mysteries, and explores how they might be related to the origins of civilization. 3 2/3 hrs. Widescreen (Enhanced); Soundtrack: English.</span></p>', 'DVD', 10),
(34, 'Citizenfour ', '300.00', 'Documentary', 1, 2010, 'Citizenfour documentry', '2907397.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">In January 2013, journalist and documentarian Laura Poitras began receiving encrypted e-mails under the name of "Citizenfour," asserting the existence of illegal surveillance programs conducted by the National Security Administration. The trail took her to the Hong Kong hotel room of contractor/programmer Edward Snowden&#9472;and her as-it-happened chronicle of his public whistleblowing, and its explosive immediate aftermath, captured the Academy Award for Best Documentary Feature. 113 min. Widescreen; Soundtrack: English.</span></p>', 'DVD', 10),
(35, 'Ken Burns: Story of Cancer / Emperor of All ', '200.00', 'Documentary', 1, 2010, 'Ken Burns: Story of Cancer / Emperor of All documentry', '2829199.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">In collaboration with "The Emperor of All Maladies: A Biography of Cancer" author Siddhartha Mukherjee, documentary filmmaker Ken Burns delivers an illuminating study of the challenging illness. Drawn to the subject for personal reasons, Burns weaves together science, history, and intimate biography in a production that reviews the evolution of treatments, modern patients'' stories, and the continuing search for a cure. Narrated by Edward Herrmann. 6 hrs. on three discs. Widescreen (Enhanced); Soundtrack: English.</span></p>', 'DVD', 10),
(36, 'San Andreas: The Next Megaquake', '201.00', 'Documentary', 1, 2010, 'San Andreas: The Next Megaquake', '2856950.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Where should the world look in anticipation of the next "megaquake"? Many believe that the San Andreas Fault will be the epicenter of this dreaded type of natural disaster, but this speculative documentary serves up the theory that our next earth-shaking catastrophe could emerge from volcanoes, landslides, and tsunamis that trigger unprecedented destruction for Vancouver, Seattle, and Portland. 80 min. Widescreen (Enhanced); Soundtrack: English.</span></p>', 'DVD', 10),
(37, 'Revelation: The End of Days', '200.00', 'Documentary', 1, 2010, 'Revelation: The End of Days', '2836229.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">See what a biblical apocalypse would look like through the eyes of everyday people in this provocative History Channel miniseries that explores the Book of Revelation. Compiling "found footage" from cell phones and camcorders, as well as "first-person accounts" from a TV news reporter and cameraman in search of the Antichrist, this faith-based TV miniseries offers a compelling dramatization of end-times prophecies. 172 min. Widescreen (Enhanced); Soundtrack: English Dolby Digital stereo; Subtitles: English (SDH).</span></p>', 'DVD', 10),
(38, 'A Sinner in Mecca', '200.00', 'Documentary', 1, 2010, 'A Sinner in Mecca documentry', '3358858.jpg', '', 'DVD', 10),
(39, 'Nova: Dawn of Humanity', '125.00', 'Drama', 0, 2010, 'Nova: Dawn of Humanity documentry', '2934946.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">This illuminating collaboration between "Nova" and National Geographic leads viewers on a spellbinding exploration of a South African cave that has yielded a wealth of new fossil evidence about mankind''s beginnings. Join a team of experts as they lay out the discoveries that help us better understand the links between modern human beings and their more apelike ancestors. 120 min. Widescreen (Enhanced); Soundtrack: English.</span></p>', 'DVD', 10),
(40, 'Bitter Rice', '200.00', 'Drama', 1, 2010, 'Bitter Rice drama', '2941466.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Silvana Mangano became an international sensation with her performance as a shapely city woman working in the rice fields of Italy''s Po Valley after World War II. The sexy Mangano is caught in a love triangle with the respectable Raf Vallone and the unscrupulous Vittorio Gassman in this Neo-Realist classic. 109 min. Standard; Soundtrack: Italian; Subtitles: English. In Italian with English subtitles.</span></p>', 'DVD', 10),
(41, 'Rock Hudson: Screen Legend Collection', '100.00', 'Drama', 0, 2014, 'Rock Hudson: Screen Legend Collection', '961827.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Man''s man Rock Hudson heats up the screen in a three-disc, five-film set! When a rich, old man (Charles Coburn) leaves a fortune to the family of a woman he once loved, a soda jerk (Hudson) finds he''s no longer the perfect lad for the clan''s daughter, in "Has Anybody Seen My Gal?" (1952). Piper Laurie, Gigi Perreau co-star. Hudson wears the white hat, and Kirk Douglas the black, in the muscular Western "The Last Sunset" (1961), with Dorothy Malone and Joseph Cotten. Giving an intense performance, Hudson plays an egotistical doctor working in the jungle, in "The Spiral Road" (1962). Burl Ives, Gena Rowlands also star. And playboy Rock is asked to woo psychiatrist Leslie Caron by her father (Charles Boyer) in the romantic comedy "A Very Special Favor" (1965). Walter Slezak, Larry Storch co-star. Also includes "The Golden Blade." 8 3/4 hrs. total. Standard; Soundtrack: English Dolby Digital stereo; Subtitles: English (SDH), French; theatrical trailers.</span></p>', 'DVD', 10),
(42, 'A Walk in the Clouds (', '125.00', 'Drama', 1, 1987, 'A Walk in the Clouds ( drama', '453682.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">From director Alfonso Arau ("Like Water for Chocolate") comes this lush, romantic drama. Keanu Reeves stars as a newly returned WWII soldier Sgt. Paul Sutton, who agrees to help a woman he befriends on a bus by posing as her husband and meeting her family at their Napa Valley vineyard. As the ruse continues, Paul falls in love with his "wife" and sets out to prove his worth to her father. Aitana S&aacute;nchez-Gij&oacute;n, Giancarlo Giannini, Anthony Quinn co-star. 102 min. Widescreen; Soundtracks: English Dolby Digital 5.1, French Dolby Digital Surround, Spanish Dolby Digital Surround; Subtitles: English, Spanish.</span></p>', 'DVD', 10),
(43, 'Safe Haven', '240.00', 'Drama', 0, 2016, 'Safe Haven drama', '2172957.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Fleeing an abusive relationship, Erin (Julianne Hough) assumes a new identity in a small North Carolina town. Now calling herself Katie, she bonds with widower Alex (Josh Duhamel) and his two young children (Mimi Kirkland and Noah Lomax). But Katie and Alex soon find their relationship threatened by the arrival of her husband (David Lyons), a police officer who''s used his connections to track her down. Cobie Smulders also stars in this stirring adaptation of Nicholas Sparks'' novel. 116 min. Widescreen; Soundtrack: English Dolby Digital 5.1; Subtitles: English (SDH), Spanish; deleted scenes; extended scenes; alternate ending.</span></p>', 'DVD', 10),
(44, 'Urban Cowboy', '240.00', 'Drama', 1, 2010, 'Urban Cowboy drama', '2102593.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Moving from his rural Texas home to take an oil refinery job near Houston, young hardhat John Travolta begins hanging out at famed honky tonk nightclub Gilley''s. In this world of country music, "weekend cowboys," and fast women, Travolta falls for feisty Debra Winger, but their romance has more bumps than a ride on the mechanical bull. Scott Glenn, Madolyn Smith co-star, with appearances by The Charlie Daniels Band, Bonnie Raitt, and others. 134 min. Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, Dolby Digital Surround, French Dolby Digital mono; Subtitles: English, Spanish, Portuguese; outtakes; behind-the-scenes footage.</span></p>', 'DVD', 10),
(45, 'Wuthering Heights', '125.00', 'Drama', 0, 2016, 'Wuthering Heights drama', '2106767.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Emily Bront&euml;''s classic novel of doomed love in 19th-century England is brought to the screen in a stunning production that stars Laurence Olivier as the brooding Heathcliff and Merle Oberon as his paramour, Catherine. As a visitor to the titular estate learns the story of Heathcliff and Cathy''s tragic tale, insights into the eternal power of romance are revealed. With David Niven, Flora Robson, Donald Crisp, Geraldine Fitzgerald; William Wyler directs. 104 min. Standard; Soundtrack: English Dolby Digital mono; Subtitles: English (SDH), Spanish, French; interview; theatrical trailer.</span></p>', 'DVD', 10),
(46, 'An Unfinished Life ', '200.00', 'Drama', 1, 1983, 'An Unfinished Life drama', '1823360.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">Fleeing from her abusive boyfriend, single mother Jennifer Lopez travels to the Wyoming ranch of her former father-in-law (Robert Redford). Estranged since the death of her husband/his son, the pair slowly begins to rebuild their relationship as Redford cares for bedridden ranch hand Morgan Freeman and Lopez starts a tentative romance with the police chief. Life-affirming drama co-stars Josh Lucas, Damian Lewis, Camryn Manheim. 108 min. Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, French Dolby Digital 5.1; Subtitles: English (SDH), Spanish; audio commentary; featurettes; photo gallery.</span></p>', 'DVD', 10),
(47, 'Fifty Shades of Grey ', '125.00', 'Drama', 1, 2016, 'Fifty Shades of Grey drama', '2862842.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">What began as "Twilight" fan fiction and became the first in a trilogy of bestselling books by author E.L. James comes to the screen, introducing BDSM-curious viewers to the start of the kinky romance between literature student Anastasia Steele (Dakota Johnson) and wealthy businessman Christian Grey (Jamie Dornan). Their lust-at-first-sight relationship is tested when she learns his turn-ons include blindfolds, ropes, and riding crops. With Eloise Mumford, Marcia Gay Harden. 126 min. Widescreen (Enhanced); Soundtracks: English Dolby Digital 5.1, DVS Dolby Digital stereo, Spanish Dolby Digital 5.1, French Dolby Digital 5.1; Subtitles: English (SDH), Spanish, French; featurettes.</span></p>', 'DVD', 10),
(48, 'Blue Is the Warmest Color (Criterion Collection)', '120.00', 'Drama', 0, 2016, 'Blue Is the Warmest Color (Criterion Collection) drama', '2393630.jpg', '<p><span style="color: #333333; font-family: Lato, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px;">One of the most controversial films in recent memory, director Abdellatif Kechiche''s graphic, erotic coming-of-age odyssey follows restless French high school junior Ad&egrave;le (Ad&egrave;le Exarchopoulos) as she meets blue-haired, twentysomething art student Emma (L&eacute;a Seydoux). The decade-long relationship that forms between the two changes both women''s lives...but even the most passionate of romances can come to a sudden end. 179 min. Widescreen (Enhanced); Soundtrack: French Dolby Digital 5.1; Subtitles: English; theatrical trailer; TV spot. In French with English subtitles.</span></p>', 'DVD', 10);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_total` decimal(5,2) NOT NULL,
  `order_date` date NOT NULL,
  `require_date` date NOT NULL,
  `cust_id` int(11) NOT NULL,
  `country` varchar(50) COLLATE utf8_bin NOT NULL,
  `city` varchar(50) COLLATE utf8_bin NOT NULL,
  `order_status` varchar(11) COLLATE utf8_bin NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `order_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `movie_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `movie_img` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`order_det_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_det_id`, `order_id`, `movie_id`, `price`, `quantity`, `total`, `movie_title`, `movie_img`) VALUES
(1, 0, 6, '100.00', 1, '100.00', 'test', 'test.jp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
