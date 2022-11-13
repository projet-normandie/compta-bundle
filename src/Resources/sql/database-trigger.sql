-- User
delimiter //
DROP TRIGGER IF EXISTS `CptdonationAfterInsert`//
CREATE TRIGGER `CptdonationAfterInsert` AFTER INSERT ON `cpt_donation`
FOR EACH ROW
BEGIN
    IF (SELECT COUNT(id) FROM cpt_compta WHERE idSource=1 AND month = SUBSTRING(NEW.dateDonation,1,7)) = 0
    THEN
		INSERT INTO cpt_compta (month, idSource, idType, value) VALUES (SUBSTRING(NEW.dateDonation,1,7), 1, 1, NEW.value);
	ELSE
        UPDATE cpt_compta a
        SET value = (SELECT SUM(value) FROM cpt_donation WHERE SUBSTRING(dateDonation,1,7) = SUBSTRING(NEW.dateDonation,1,7))
        WHERE a.idType = 1
        AND a.month = SUBSTRING(NEW.dateDonation,1,7);
	END IF;
END //
delimiter ;

delimiter //
DROP TRIGGER IF EXISTS `CptdonationAfterUpdate`//
CREATE TRIGGER `CptdonationAfterUpdate` AFTER UPDATE ON `cpt_donation`
FOR EACH ROW
BEGIN
    UPDATE cpt_compta a
    SET value = (SELECT SUM(value) FROM cpt_donation WHERE SUBSTRING(dateDonation,1,7) = SUBSTRING(NEW.dateDonation,1,7))
    WHERE a.idType = 1
    AND a.month = SUBSTRING(NEW.dateDonation,1,7);
END //
delimiter ;

delimiter //
DROP TRIGGER IF EXISTS `CptdonationAfterDelete`//
CREATE TRIGGER `CptdonationAfterDelete` AFTER DELETE ON `cpt_donation`
FOR EACH ROW
BEGIN
    UPDATE cpt_compta a
    SET value = (SELECT SUM(value) FROM cpt_donation WHERE SUBSTRING(dateDonation,1,7) = SUBSTRING(OLD.dateDonation,1,7))
    WHERE a.idType = 1
    AND a.month = SUBSTRING(OLD.dateDonation,1,7);
END //
delimiter ;

