USE test;
CREATE TABLE Users
(
    ID             INT            NOT NULL,
    LastName       NVARCHAR(255)  NOT NULL,
    FirstName      NVARCHAR(255)  NOT NULL,
    DateOfBirth    DATE           NOT NULL,
    Subscribers    INT UNSIGNED DEFAULT 0,
    ProfilePicture NVARCHAR(5000) NULL,
    PRIMARY KEY (ID)
);


CREATE TABLE UserFollowers
(
    ID         INT NOT NULL,
    UserID     INT NOT NULL,
    FollowerID INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UserID) REFERENCES Users (ID),
    FOREIGN KEY (FollowerID) REFERENCES Users (ID)
);


CREATE TABLE UserImages
(
    ID      INT            NOT NULL,
    UserID  INT            NOT NULL,
    Picture NVARCHAR(5000) NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UserID) REFERENCES Users (ID)
);


CREATE TABLE UserVideos
(
    ID      INT            NOT NULL,
    UserID  INT            NOT NULL,
    Picture NVARCHAR(5000) NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UserID) REFERENCES Users (ID)
);


CREATE TABLE Posts
(
    ID     INT NOT NULL,
    UserID INT NOT NULL,
    DateTime DATETIME DEFAULT CURRENT_TIMESTAMP,
    Text TEXT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UserID) REFERENCES Users (ID)
);


CREATE TABLE PostImages
(
    ID      INT NOT NULL,
    PostID  INT NOT NULL,
    ImageID INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (PostID) REFERENCES Posts (ID),
    FOREIGN KEY (ImageID) REFERENCES UserImages (ID)
);


CREATE TABLE PostComments
(
    ID     INT NOT NULL,
    UserID INT NOT NULL,
    PostID INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UserID) REFERENCES Users (ID),
    FOREIGN KEY (PostID) REFERENCES Posts (ID)
);


CREATE TABLE PostLikes
(
    ID     INT NOT NULL,
    UserID INT NOT NULL,
    PostID INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UserID) REFERENCES Users (ID),
    FOREIGN KEY (PostID) REFERENCES Posts (ID)
);

