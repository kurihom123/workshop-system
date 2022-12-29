CREATE TABLE User_T(
UserID VARCHAR(20) NOT NULL,
UserName VARCHAR(25) NOT NULL,
UserDOB VARCHAR(30),
UserPassword VARCHAR(20),
UserEmail VARCHAR(45),
UserGender VARCHAR(49),
UserMobileNo VARCHAR(25),
UserPosition VARCHAR(49),
CONSTRAINT User_PK PRIMARY KEY (UserID));


CREATE TABLE Messages_T(
MessageID VARCHAR(20) NOT NULL,
SenderNmae VARCHAR(34),
ReceiverName VARCHAR(200),
UserPosition VARCHAR(44),
MessageText LONGTEXT,
TimeSent VARCHAR(50),
User_UserID VARCHAR(20) NOT NULL,
CONSTRAINT Messages_PK PRIMARY KEY (MessageID),
CONSTRAINT Messages_FK FOREIGN KEY (User_UserID) REFERENCES User_T (UserID));

CREATE TABLE UserProjectCode_T(
UserProjectCodeID VARCHAR(45) NOT NULL,
UserProjectCodeName VARCHAR(50),
User_UserID VARCHAR(20) NOT NULL,
CONSTRAINT UserProjectCode_PK PRIMARY KEY (UserProjectCodeID));


CREATE TABLE Project_T(
ProjectID VARCHAR(50) NOT NULL,
ProjectCode VARCHAR(50),
ProjectName VARCHAR(50),
User_UserID VARCHAR(20) NOT NULL,
CONSTRAINT Project_PK PRIMARY KEY (ProjectID),
CONSTRAINT Project_FK1 FOREIGN KEY (User_UserID) REFERENCES User_T (UserID));


CREATE TABLE Activity_T(
ActivityID VARCHAR(30) NOT NULL,
ActivityCode VARCHAR(30),
ActivityName VARCHAR(30),
ActivityExplanation LONGTEXT,
Project_ProjectID VARCHAR(50) NOT NULL,
CONSTRAINT Activity_PK PRIMARY KEY (ActivityID),
CONSTRAINT Activity_FK FOREIGN KEY (Project_ProjectID) REFERENCES Project_T (ProjectID));


CREATE TABLE Workshop_T(
WorkshopID VARCHAR(30) NOT NULL,
WorkshopCode VARCHAR(50),
WorkshopName LONGTEXT,
WorkshopTheme LONGTEXT,
WorkshopStartTime DATE,
WorkshopEndTime DATE,
WorkshopFacilitator VARCHAR(50),
WorkshopParticipants VARCHAR(50),
WorkshopCost VARCHAR(50),
WorkshopCategory VARCHAR(50),
WorkshopStoreDocument VARCHAR(20),
WorkshopLocation VARCHAR(50),
Activity_ActivityID VARCHAR(30) NOT NULL,
CONSTRAINT Workshop_PK PRIMARY KEY (WorkshopID),
CONSTRAINT Workshop_FK FOREIGN KEY (Activity_ActivityID) REFERENCES Activity_T (ActivityID));


CREATE TABLE AttendanceReport_T(
AttendanceReportID VARCHAR(25) NOT NULL,
FirstName VARCHAR(23),
SecondName VARCHAR(30),
LastName VARCHAR(20),
MobileNumber VARCHAR(25),
Email VARCHAR(45),
Project_ProjectID VARCHAR(50) NOT NULL,
CONSTRAINT AttendanceReport_PK PRIMARY KEY (AttendanceReportID),
CONSTRAINT AttendanceReport_FK1 FOREIGN KEY (Project_ProjectID) REFERENCES Project_T (ProjectID));