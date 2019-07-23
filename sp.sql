DELIMITER $$

CREATE PROCEDURE selectQtype()
BEGIN
SELECT * FROM tbl_que_type ORDER BY qid
END
$$

CREATE PROCEDURE insertQtype(IN qType varchar(255))
BEGIN
INSERT INTO tbl_que_type(que_type) VALUES (qType);
END
$$

CREATE PROCEDURE singleQtype(IN qId INT(11))
BEGIN
SELECT * FROM tbl_que_type WHERE qid = qId;
END
$$

CREATE PROCEDURE updateQtype(IN qId INT(11), qType varchar(255))
BEGIN
UPDATE tbl_que_type SET que_type = qType WHERE qid = qId;
END
$$

CREATE PROCEDURE deleteQtype(IN qId INT(11))
BEGIN
DELETE FROM tbl_que_type WHERE qid = qId;
END
$$




CREATE PROCEDURE selectQmaster()
BEGIN
SELECT * FROM tbl_que_master ORDER BY qmid
END
$$

CREATE PROCEDURE insertQmaster(IN qId int(11), qName varchar(255), qAnswer1 text, qAnswer2 text, qAnswer3 text, qAnswer4 text, qStatus tinyint(1), qCreatedon datetime, qUpdatedon datetime)
BEGIN
INSERT INTO tbl_que_master(qid, que_name, answer1, answer2, answer3, answer4, status, createdon, updatedon) VALUES (qId, qName, qAnswer1, qAnswer2, qAnswer3, qAnswer4, qStatus, qCreatedon, qUpdatedon);
END
$$

CREATE PROCEDURE singleQmaster(IN qmId INT(11))
BEGIN
SELECT * FROM tbl_que_master WHERE qmid = qmId;
END
$$

CREATE PROCEDURE updateQmaster(IN qId int(11), qName varchar(255), qAnswer1 text, qAnswer2 text, qAnswer3 text, qAnswer4 text, qStatus tinyint(1), qCreatedon datetime, qUpdatedon datetime)
BEGIN
UPDATE tbl_que_master SET qid = qId, que_name = qName, answer1 = qAnswer1, answer2 = qAnswer2, answer3 = qAnswer3, answer4 = qAnswer4, status = qStatus, createdon = qCreatedon, updatedon = qUpdatedon WHERE qid = qmId;
END
$$

CREATE PROCEDURE deleteQmaster(IN qmId INT(11))
BEGIN
DELETE FROM tbl_que_master WHERE qmid = qmId;
END
$$