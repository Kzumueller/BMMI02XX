CREATE TABLE `la_to_votox` (
`source` VARCHAR(5) NOT NULL ,
`votox` VARCHAR(5) NOT NULL ,
`comment` VARCHAR(256) NOT NULL DEFAULT ''
) ENGINE = InnoDB;

INSERT INTO `latin_to_votox` VALUES
    ("A", "u", ""),
    ("B", "b", ""),
    ("C", "tS!", ""),
    ("D", "d", ""),
    ("E", "e", ""),
    ("F", "v", ""),
    ("G", "g", ""),
    ("H", "H", ""),
    ("I", "E", ""),
    ("J", "y", ""),
    ("K", "K", ""),
    ("L", "l", ""),
    ("M", "m", ""),
    ("N", "n", ""),
    ("O", "o", ""),
    ("P", "P", ""),
    ("Q", "Kw", ""),
    ("R", "r", ""),
    ("S", "S", ""),
    ("T", "T", ""),
    ("U", "O", ""),
    ("V", "w", ""),
    ("W", "w", ""),
    ("X", "X", "or KS"),
    ("Y", "y", ""),
    ("Z", "z", "");