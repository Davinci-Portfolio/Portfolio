-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 okt 2017 om 14:32
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `answer` text,
  `date` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `answers`
--

INSERT INTO `answers` (`id`, `subject_id`, `question_id`, `student_id`, `answer`, `date`) VALUES
(1, 1, 1, 99033825, 'Ik vond het een geweldig filmpje.', '03-12-17'),
(2, 2, 2, 99033888, 'De naam', '03-12-17'),
(3, 3, 3, 99033825, 'Ik vond het een geweldig plaatje.', '03-12-17');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cohorts`
--

CREATE TABLE `cohorts` (
  `id` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cohorts`
--

INSERT INTO `cohorts` (`id`, `description`) VALUES
(1, 2015);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `imports`
--

CREATE TABLE `imports` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `file_size` varchar(250) NOT NULL,
  `file_date` varchar(250) NOT NULL,
  `file_active` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `imports`
--

INSERT INTO `imports` (`id`, `filename`, `file_size`, `file_date`, `file_active`) VALUES
(5, 'Economie-opdracht.csv', '12 kb', '30-05-2017', '0'),
(6, 'SampleCSVFile_2kb.csv', '1.07', '16-06-2017', '1'),
(7, 'Samp2kb.csv', '1.15', '16-06-2017', '1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `questions`
--

INSERT INTO `questions` (`id`, `subject_id`, `question`) VALUES
(1, 1, 'Wat vond jij van het filmpje?'),
(3, 3, 'Wat vond jij van het plaatje?'),
(2, 2, 'Wat is het verschil tussen java en javascript.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `students`
--

CREATE TABLE `students` (
  `name` varchar(250) NOT NULL,
  `ov_number` int(250) NOT NULL,
  `admin` int(3) DEFAULT NULL,
  `klas` text,
  `wachtwoord` text,
  `cohort_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `students`
--

INSERT INTO `students` (`name`, `ov_number`, `admin`, `klas`, `wachtwoord`, `cohort_id`) VALUES
('Fenno', 99034050, 1, 'lpiaoa2', '123', 1),
('Piet', 99034054, 0, 'lpiaoa1', '123', 1),
('Docent', 99034056, 1, 'lpiaoa1', '123', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `subtopic` varchar(250) NOT NULL,
  `display` varchar(2) NOT NULL DEFAULT '0',
  `display_date` date DEFAULT NULL,
  `cohort` text NOT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `subtopic`, `display`, `display_date`, `cohort`, `subject_id`) VALUES
(1, 'vitaal burgerschap', 'Burgschap', '1', '2017-10-13', '2015', 1),
(2, 'ICT', 'Javascript', '1', '2017-10-12', '2016', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subject_done`
--

CREATE TABLE `subject_done` (
  `id` int(11) NOT NULL,
  `subject_id` int(250) NOT NULL,
  `done` varchar(5) DEFAULT NULL,
  `ov_number` int(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `Comment` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `subject_done`
--

INSERT INTO `subject_done` (`id`, `subject_id`, `done`, `ov_number`, `name`, `Comment`) VALUES
(1, 1, 'Yes', 99035055, 'Furkan', 'Plaatje zag er goed uit.'),
(2, 2, 'Yes', 99033344, 'Fenno', 'En nog veel meer.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `cohorts`
--
ALTER TABLE `cohorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ov_number`),
  ADD KEY `ov_number` (`ov_number`);

--
-- Indexen voor tabel `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `subject_done`
--
ALTER TABLE `subject_done`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT voor een tabel `cohorts`
--
ALTER TABLE `cohorts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `subject_done`
--
ALTER TABLE `subject_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
