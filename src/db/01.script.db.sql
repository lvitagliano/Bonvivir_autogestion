ALTER TABLE Customers CHANGE `Phone` `PhoneNumber` text;
ALTER TABLE Customers ADD COLUMN AreaCode TEXT AFTER IdType;
ALTER TABLE Subscriptions ADD COLUMN JsonRequest TEXT AFTER ClubLaNacionCard