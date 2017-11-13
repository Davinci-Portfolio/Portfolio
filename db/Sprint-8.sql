-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 nov 2017 om 20:29
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
  `ov_number` int(11) NOT NULL,
  `answer` text,
  `date` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `answers`
--

INSERT INTO `answers` (`id`, `subject_id`, `question_id`, `ov_number`, `answer`, `date`) VALUES
(107, 1, 1, 99035267, 'goed filmpje', '12-11-2017'),
(114, 2, 2, 99034050, 'Weet ik niet.', '12-11-2017'),
(119, 2, 2, 99034050, 'Best wel veel.', '12-11-2017');

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
(10, 2, 'wat is java?'),
(2, 2, 'wat weet jij van javascript?');

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
  `cohort` int(11) NOT NULL,
  `profile_img` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `students`
--

INSERT INTO `students` (`name`, `ov_number`, `admin`, `klas`, `wachtwoord`, `cohort`, `profile_img`) VALUES
('Fenno', 99034050, 1, 'lpiaoa2', '123', 2015, ''),
('Docent', 99034056, 1, 'lpiaoa1', '123', 2014, '');

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
(2, 'ICT', 'Javascript', '0', '2017-10-12', '2016', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subject_done`
--

CREATE TABLE `subject_done` (
  `id` int(11) NOT NULL,
  `subject_id` int(250) NOT NULL,
  `done` varchar(5) DEFAULT NULL,
  `ov_number` int(20) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `Comment` text,
  `edited_by` varchar(20) DEFAULT NULL,
  `subject` text NOT NULL,
  `cohort` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `subject_done`
--

INSERT INTO `subject_done` (`id`, `subject_id`, `done`, `ov_number`, `name`, `Comment`, `edited_by`, `subject`, `cohort`) VALUES
(651, 1, 'Yes', NULL, 'Docent', NULL, NULL, 'vitaal burgerschap', 2014),
(657, 2, 'Yes', 99034050, 'Fenno', NULL, NULL, 'ICT', 2015);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexen voor tabel `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT voor een tabel `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `subject_done`
--
ALTER TABLE `subject_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
