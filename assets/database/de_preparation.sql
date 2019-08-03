CREATE TABLE `de_preparation` (
`search` VARCHAR(5) NOT NULL ,
`replace` VARCHAR(5) NOT NULL
) ENGINE = InnoDB;

INSERT INTO `de_preparation` VALUES
("AE", "Ä"),
("OE", "Ö"),
("ß", "S"),
("ST", "SCHT"),
("SCH", "1"),
("IE", "3"),
("EI", "4"),
("EU", "OI"),
("CK", "K"),
("ÄU", "OI"),
("OI", "2"),
("Ö", "5"),
("Y", "I"),
("Ü", "6"),
("ICH", "I1"),
("AUCH", "AU7"),
("CH", "7"),
("MM", "M"),
("NN", "N"),
("LL", "L"),
("TT", "T");