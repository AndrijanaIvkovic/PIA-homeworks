-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2021 at 10:58 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmovi`
--

DROP TABLE IF EXISTS `filmovi`;
CREATE TABLE IF NOT EXISTS `filmovi` (
  `naslov` varchar(50) CHARACTER SET utf8 NOT NULL,
  `opis` longtext CHARACTER SET utf8 NOT NULL,
  `zanr_filma` varchar(50) CHARACTER SET utf8 NOT NULL,
  `scenarista` text CHARACTER SET utf8 NOT NULL,
  `reziser` text CHARACTER SET utf8 NOT NULL,
  `producentska_kuca` varchar(50) CHARACTER SET utf8 NOT NULL,
  `glumci` text CHARACTER SET utf8 NOT NULL,
  `godina_izdanja` int(11) NOT NULL,
  `slika` varchar(100) CHARACTER SET utf8 NOT NULL,
  `trajanje` varchar(50) CHARACTER SET utf8 NOT NULL,
  `zanr` int(11) NOT NULL,
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `filmovi`
--

INSERT INTO `filmovi` (`naslov`, `opis`, `zanr_filma`, `scenarista`, `reziser`, `producentska_kuca`, `glumci`, `godina_izdanja`, `slika`, `trajanje`, `zanr`, `f_id`) VALUES
('Another Round', 'Martin je nastavnik u srednjoj skoli, koji se oseca starim i umornim. On je stalno u sukobu sa ucenicima i njihovim roditeljima. Sa svoja tri ucenika krece u eksperiment kojim bi dokazao koliko je ucesce alkohola u nasim svakodnevnim odlukama. Ako Churchill dobija Drugi svetski rat, a i sam donosi odluke pod uticajem alkoholnih isparenja, sta tek da se kaze za odluke koje pod uticajem alkohola donose jedan profesor ili njegovi ucenici? U pocetku, rezultat je pozitivan, a Martinov razred dobija priznanja u akademskim krugovima. Ali, polako, ali sigurno, alkohol uzima svoj danak...', 'komedija', 'Janus Billeskov Jansen, Anne Osterud', 'Thomas Vinterberg, Tobias Lindholm', 'Zentropa', 'Mads Mikkelsen,\r\nThomas Bo Larsen,\r\nMagnus Millang,\r\nLars Ranthe', 2020, 'img/kom1.jpg', '115 min', 1, 1),
('Soul', 'SOUL prati Joea Gardnera, ucitelja benda u srednjoj skoli cija je prava strast sviranje jazza. Joe je imao krizu kakvu imaju svi umetnici. Sve se vise oseca kao da se njegov celozivotni san da ce biti jazz muzicar nece ispastati i pita se \"Zasto sam ovde? Sta sam mislio da radim?\"\r\n\r\nTaman kad Joe pomisli da mu je san mogao biti dostupan, jedan neocekivani korak salje ga u fantasticno mesto gde je prisiljen ponovno razmisliti o tome sta zaista znaci imati dusu. Tu se susrece i na kraju se udruzi sa 22 godine, dusom koja ne misli da je zivot na Zemlji sve ono sto treba napraviti.', 'komedija', 'Kevin Nolting', 'Pete Docter, Kemp Powers', 'Walt Disney Pictures, Pixar Animation Studios', 'Jamie Foxx,\r\nTina Fey,\r\nGraham Norton,\r\nRachel House,\r\nAlice Braga,\r\nRichard Ayoade,\r\nPhylicia Rashad,\r\nDonnell Rawlings Questlove,\r\nAngela Bassett', 2020, 'img/kom2.jpg', '100 min', 1, 2),
('We Can Be Heroes', 'Kad vanzemaljski napadaci otmu zemaljske superheroje, njihova su deca odvucena do vladine sigurne kuce. Ali pametna Missy Moreno (Yaya Gosselin) nece se zaustaviti ni pred kim kako bi spasila svog oca superheroja, Marcusa Morena (Pedro Pascal). Missy se udruzuje s ostatkom super dece kako bi pobegla od njihove tajanstvene vladine dadilje, gospodje Granade (Priyanka Chopra Jonas). Ako hoce da spasi roditelje, morace da koristi svoje individualne moci od elasticnosti do vremenske kontrole do predvidjanja buducnosti i da formira tim izvan sveta.', 'komedija', 'Robert Rodriguez', 'Robert Rodriguez\r\n	\r\n', 'Double R Productions', 'Robert Rodriguez,\r\nStarring,	\r\nPriyanka Chopra Jonas,\r\nPedro Pascal,\r\nYaYa Gosselin,\r\nBoyd Holbrook,\r\nAdriana Barraza,\r\nHaley Reinhart,\r\nSung Kang,\r\nTaylor Dooley,\r\nChristian Slater', 2020, 'img/kom3.jpg', '97 min', 1, 3),
('Tenet', 'Masivni, inovativni i do sada najambiciozniji akcijski blokbaster koji je rezirao i napisao fantasticni Kristofer Nolan, poznat po mega uspesnim filmovima Pocetak, Memento, Betmen trilogija, Dunkirk, Interstellar... Radi se o jednom od najskupljih filmova ikad snimljenih. Dzon David Vasington glavni je protagonista novog Sci-Fi akcijskog spektakla Kristofera Nolana, kratkog, ali jasnog naziva \"Tenet.\" Naoruzan samo jednom recju - Tenet - i boreci se za opstanak celog sveta, glavni junak price krece kroz polumracni svet medjunarodne spijunaze na misiji koja ce se odvijati u necemu izvan stvarnog vremena. Inverzija. Nije putovanje kroz vreme.', 'triler', 'Christopher Nolan', 'Christopher Nolan\r\n	\r\n', 'Warner Bros. Pictures Syncopy', 'John David Washington,\r\nRobert Pattinson,\r\nElizabeth Debicki,\r\nHimesh Patel', 2020, 'img/tri1.jpg', '150 min', 2, 4),
('Run Hide Fight', 'Radnja filma prati omiljeni americki sport - masovna ubistva u skolama od strane poremecenih ubica.\r\n \r\nGlavni junak filma je 17-godisnja Zoe, koja koristi svoje umece i inteligenciju da spase svoj i zivot svojih drugara tokom napada grupe pucaca na lokalnu skolu. Napadaci kompletna desavanja strimuju uzivo...', 'triler', 'Matthew Lorentz', 'Kyle Rankin', 'Cinestate', 'Treat Williams kao Sheriff Tarsy,\r\nThomas Jane kao Todd Hull,\r\nBarbara Crampton kao Mrs. Crawford,\r\nJoel Michaely kao Mr. Yates,\r\nRadha Mitchell kao Jennifer Hull,\r\nBrandon Germaine kao Cop #1,\r\nShelby Mayes kao Cora Brenner,\r\nApril McCullough kao Lauren Cope,\r\nBritton Sear kao Chris Jelick,\r\nCatherine Davis kao Anna Jelick', 2020, 'img/tri2.jpg', '109 min', 2, 5),
('Parasite', 'Radnja filma prati porodicu Kim koja zivi u sirotinjskom podrumskom stanu u Seulu. Majka, otac i dvoje odrasle dece nemaju posao i snalaze se kako znaju. Rade jednokratne poslice, racune ne placaju, pa su im telefoni iskljuceni, jure besplatni vajfaj komsija, a prozor im gleda na ulicicu u kojoj uriniraju pijanci. Kada sin Ki-woo dobije priliku da daje casove engleskog cerki bogataske porodice Park, otvara se i citav niz mogucnosti za Kimove i oni jedan po jedan, uz pomoc spletki, dolaze do razlicitih poslova kod Parkovih. Gospodin i gospodja Park su japiji i zadovoljni su angazmanom Ki-wooa i njegove porodice iako ne znaju da su oni u krvnom srodstvu. Sve je u redu, ali gospodin Park na ocu koji radi kao njegov vozac ipak njusi nesto sto mu ne prija, tu je taj neki smrad koji opisuje svojoj priglupoj i prelepoj zeni, ali ne moze tacno da ga definise - miris siromastva.', 'triler', 'Bong Joon-ho', 'Bong Joon-ho', 'Barunson E&A', 'Song Kang-ho,\r\nLee Sun-kyun,\r\nCho Yeo-jeong,\r\nChoi Woo-shik,\r\nPark So-dam,\r\nLee Jung-eun,\r\nJang Hye-jin', 2019, 'img/tri3.jpg', '132 min', 2, 6),
('Nomadland', 'Nakon ekonomskog sloma trgovackog grada u ruralnoj Nevadi, Fern (Frances McDormand) pakuje svoj kombi i krece na put istrazujuci zivot izvan konvencionalnog drustva kao moderni nomad.\r\n\r\nU trecem igranom filmu rediteljke Chloe Zhao, NOMADLAND prave nomade Linda May, Swankie i Bob Wells predstavljaju Fernove mentore i saborce u njenom istrazivanju prostranog krajolika americkog Zapada.', 'drama', 'Jessica Bruder, Chloe Zhao', 'Chloe Zhao', 'Highwayman Films', 'Frances McDormand, \r\nDavid Strathairn, \r\nLinda May, \r\nSwankie, \r\nBob Wells', 2020, 'img/drama1.jpg', '108 min', 3, 7),
('Avengers : Endgame', 'Cetvrti nastavak sage o Osvetnicima predstavlja kulminaciju 22 medjusobno prepletena Marvelova filma i vrhunac epskog putovanja. Najveci svetski heroji konacno ce shvatiti koliko je krhka nasa stvarnost - i kolika je zrtva potrebna da bi se odrzala - u ovoj prici o prijateljstvu, timskom duhu i prevazilazenju razlika u cilju savladavanja nepremostivih prepreka.', 'drama', 'Christopher Markus, Stephen McFeely', 'Anthony Russo, Joe Russo', 'Marvel Studios', '	\r\nRobert Downey Jr.\r\nChris Evans,\r\nMark Ruffalo,\r\nChris Hemsworth,\r\nScarlett Johansson,\r\nJeremy Renner,\r\nDon Cheadle,\r\nPaul Rudd,\r\nBrie Larson,\r\nKaren Gillan,\r\nDanai Gurira,\r\nBenedict Wong,\r\nJon Favreau,\r\nBradley Cooper\r\n', 2019, 'img/drama2.jpg', '181 min', 3, 8),
('Mulan', 'Mlada Kineskinja maskira se u muskarca i prijavljuje u vojsku kako bi spasila svog oca.', 'drama', 'Rick Jaffa, Amanda Silver, Lauren Hynek\r\nElizabeth Martin', 'Niki Caro', 'Walt Disney Pictures', 'Yifei Liu,\r\nDonnie Yen,\r\nTzi Ma,\r\nJason Scott Lee,\r\nYoson An,\r\nRon Yuan,\r\nGong Li,\r\nJet Li', 2020, 'img/drama3.jpg', '115 min', 3, 9),
('After We Collided', 'Nastavak velike uspesne serije o ljubavi i strasti dvoje mladih koja ne priznaje granice, snimljenog prema bestseleru Ane Tod, koji je proglasen novom globalnom senzacijom poput Sumrak sage i erotsko-romanticne trilogije Pedest nijansi sive. Nakon burnog pocetka veze i sokantnog otkrica, Tesa i Hardin moraju pronaci nacin da nastave svoju romansu. No, moze li ljubav koja ne poznaje granice zaista opstati? Tesa polako pocinje da uvidja kako bi mogla da izgubi sve. Hardin shvata da nema sta da izgubi - osim nje. Da li je zaista spreman da se promeni zbog ljubavi? Koliko je ona spremna da oprosti i, jos vaznije, da li joj se zaista svidja slika buducnosti s Hardinom?', 'romanticni', 'Anna Todd, Mario Celaya', 'Roger Kumble', 'Voltage Pictures, Offspring Entertainment', 'Josephine Langford,\r\nHero Fiennes Tiffin,\r\nDylan Sprouse,\r\nShane Paul McGhie,\r\nCandice King,\r\nKhadijha Red Thunder,\r\nInanna Sarkis,\r\nSamuel Larsen,\r\nSelma Blair', 2020, 'img/rom1.jpg', '107 min', 4, 10),
('Call Me by Your Name', 'Radnja je smestena u 1983. godinu na severu Italije u mondenskom letovalistu. Bracni par Perlmen docekuju u svojoj vikendici talentovanog studenta iz Amerike, Olivera (24), koji dolazi na sest nedelja kako bi saradjivao sa profesorom Perlemnom na analizi anticke Grcke. Njihov sin Elio (17) nece biti odusevljen arogancijom gosta kojem posle nekoliko neuspesnih pokusaja zeli da se dodvori. Od cinicne odbojnosti, preko preispitivanja i osudjivanja sebe sto mu se dopada Oliver, pa sve do transparentnog iskazivanja emocija, film prati Elijovo odrastanje. Elio Perlmen ne dozivljava sebe kao homoseksualca, vec kao zbunjenog adolescenta kojem se prvi put u zivotu dopao drugi muskarac.', 'romanticni', 'James Ivory', 'Luca Guadagnino\r\n\r\n	', 'Frenesy Film Company', 'Armie Hammer,\r\nTimothee Chalamet,\r\nMichael Stuhlbarg,\r\nAmira Casar,\r\nEsther Garrel,\r\nVictoire Du Bois', 2017, 'img/rom2.jpg', '132 min', 4, 11),
('Titanic', '\"Titanic\" je americka epska romansa i film katastrofe iz 1997. godine koji je rezirao i napisao James Cameron. U ovoj fiktivnoj prici postavljenoj u senci stvarne tragedije kada je potonuo mozda najpoznatiji brod u istoriji, glume Leonardo DiCaprio kao Jack Dawson i Kate Winslet kao Rose DeWitt Bukater, pripadnici potpuno razlicitih slojeva drustva koji se zaljube u trenutku dok brod putuje prema svojoj vlastitoj propasti. Iako su glavni likovi i ljubavna prica potpuno izmisljeni, u filmu se pojavljuju i stvarne istorijske licnosti. Gloria Stuart u filmu glumi ostarelu Rose koja nas u naraciji vodi kroz celu pricu, a Billyja Zane-a glumi Cal-a Hockley-ja, njenog verenika iz mladih dana.', 'romanticni', 'James Cameron', 'James Cameron\r\n\r\n', 'Paramount Pictures, 20th Century Fox', 'Leonardo DiCaprio,\r\nKate Winslet,\r\nBilly Zane,\r\nKathy Bates,\r\nFrances Fisher,\r\nBernard Hill,\r\nJonathan Hyde,\r\nDanny Nucci,\r\nDavid Warner,\r\nBill Paxton', 1997, 'img/rom3.jpg', '195 min', 4, 12),
('The Midnight Sky', 'Postapokalipticna prica koja prati Augustina, usamljenog naucnika na Arktiku, koji se utkuje sa vremenom kako bi zaustavio Sully i njene kolege astronaute da se vrate kuci u misterioznu globalnu katastrofu...', 'sci-fi', 'Mark L. Smith', 'George Clooney', 'Smokehouse Pictures, Anonymous Content', 'George Clooney,\r\nFelicity Jones,\r\nDavid Oyelowo,\r\nTiffany Boone,\r\nDemián Bichir,\r\nKyle Chandler,\r\nCaoilinn Springall', 2020, 'img/sci1.jpg', '118 min', 5, 13),
('Wonder Woman', 'Pre nego sto je postala Wonder Woman, bila je Dijana, princeza Amazonki, obucena da bude nesavladiva ratnica. Odrasla je na zabacenom rajskom ostrvu, kada se americki pilot srusio na obali i ispricao joj o velikom konfliktu u spoljnem svetu. Dijana ostavlja svoj dom uverena da moze da pomogne. Bori se zajedno s muskarcem da bi zaustavila rat svih ratova. Tako otkriva svoju potpunu moc i sudbinu...', 'sci-fi', 'Allan Heinberg', 'Patty Jenkins', 'DC Films, RatPac Entertainment', 'Gal Gadot,\r\nChris Pine,\r\nRobin Wright,\r\nDanny Huston,\r\nDavid Thewlis,\r\nConnie Nielsen,\r\nElena Anaya', 2017, 'img/sci2.jpg', '141 min', 5, 14),
('Captain Marvel', 'Carol Danvers postaje jedan od najsnaznijih superheroja u univerzumu, u trenutku kada se Zemlja nadje u sred galaktickog rata izmedju dve vanzemaljske civilizacije.', 'sci-fi', 'Anna Boden, Ryan Fleck', 'Anna Boden, Ryan Fleck', 'Marvel Studios', 'Brie Larson,\r\nSamuel L. Jackson,\r\nBen Mendelsohn,\r\nDjimon Hounsou,\r\nLee Pace,\r\nLashana Lynch,\r\nGemma Chan,\r\nAnnette Bening,\r\nClark Gregg,\r\nJude Law', 2019, 'img/sci3.jpg', '124 min', 5, 15),
('Run', 'Tinejdzerka koja se skoluje od kuce pocinje sumnjati kako njena majka krije od nje mracnu tajnu...', 'horor', 'Aneesh Chaganty', 'Aneesh Chaganty\r\n', 'Search Party, Lionsgate Filmsanty', 'Sarah Paulson, \r\nKiera Allen, \r\nPat Healy,\r\nErik Athavale, \r\nBradley Sawatzky, \r\nOnalee Ames, \r\nClark Webster', 2020, 'img/hor1.jpg', '89 min', 6, 16),
('The Witch', 'Film je smesten u 17. vek i prati puritansku doseljenicku porodicu koja je napustila civilizaciju i zamenila je zivotom u divljinama Nove Engleske. Ubrzo nakon uspostavljanja novog zivota, porodici iznenada nestaje novorodjeni sin, a njihova cerka je osumnjicena za vesticarenje, te porodica krece da se urusava pod uticajem nepoznatog zla.', 'horor', 'Robert Eggers', 'Robert Eggers\r\n\r\n	\r\n', 'Parts and Labor, RT Features', 'Anya Taylor-Joy,\r\nRalph Ineson,\r\nKate Dickie,\r\nHarvey Scrimshaw,\r\nEllie Grainger,\r\nLucas Dawson', 2015, 'img/hor2.jpg', '93 min', 6, 17),
('Hereditary', 'Nakon sto porodicni matrijar odlazi, porodica ozaloscena tragicnim i uznemiravajucim pojavama pocinje da otkriva mracne tajne.', 'horor', 'Jennifer Lame, Lucian Johnston', 'Ari Aster', 'A24, PalmStar Media', 'Toni Collette,\r\nAlex Wolff,\r\nMilly Shapiro,\r\nAnn Dowd,\r\nGabriel Byrne', 2018, 'img/hor3.jpg', '127 min', 6, 18);

-- --------------------------------------------------------

--
-- Table structure for table `ocenjivanje`
--

DROP TABLE IF EXISTS `ocenjivanje`;
CREATE TABLE IF NOT EXISTS `ocenjivanje` (
  `s_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  PRIMARY KEY (`s_id`,`f_id`) KEY_BLOCK_SIZE=1024
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ocenjivanje`
--

INSERT INTO `ocenjivanje` (`s_id`, `f_id`, `ocena`) VALUES
(3, 1, 3),
(3, 2, 9),
(3, 3, 7),
(3, 5, 4),
(2, 1, 1),
(2, 2, 10),
(2, 3, 8),
(2, 6, 3),
(2, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `ime` text NOT NULL,
  `prezime` text NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `adr` (`adresa`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`ime`, `prezime`, `adresa`, `username`, `password`, `admin`, `s_id`) VALUES
('Andrijana', 'Ivkovic', 'andrijanakg1998@gmail.com', 'anakg', 'ana123', 'admin', 1),
('Pera', 'Peric', 'perakg1@gmail.com', 'pera123', 'pera555', '', 2),
('1', '1', '1', '1', '1', '', 3),
('Marko', 'Markovic', 'marko01@gmail.com', 'mare01', 'markovic000', '', 7),
('Ivan', 'Ivanovic', 'ivankg1998@gmail.com', 'ivan_kg', 'ivan222', ' ', 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
