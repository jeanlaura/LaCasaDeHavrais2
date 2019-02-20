#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: LCDH_tables
#------------------------------------------------------------

CREATE TABLE LCDH_tables(
        tables_id        Int  Auto_increment  NOT NULL ,
        tables_numTables Varchar (10) NOT NULL
	,CONSTRAINT LCDH_tables_PK PRIMARY KEY (tables_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LCDH_reservation
#------------------------------------------------------------

CREATE TABLE LCDH_reservation(
        reservation_id          Int  Auto_increment  NOT NULL ,
        reservation_lastname    Varchar (50) NOT NULL ,
        reservation_firstname   Varchar (50) NOT NULL ,
        reservation_numTel      Varchar (10) NOT NULL ,
        reservation_mail        Varchar (50) NOT NULL ,
        reservation_dateResa    Date NOT NULL ,
        reservation_hourResa    Time NOT NULL ,
        reservation_nbPers      TinyINT NOT NULL ,
        reservation_arrive      TinyINT NOT NULL ,
        reservation_mailConfirm Int NOT NULL ,
        reservation_smsConfirm  Int NOT NULL ,
        tables_id               Int NOT NULL
	,CONSTRAINT LCDH_reservation_PK PRIMARY KEY (reservation_id)

	,CONSTRAINT LCDH_reservation_LCDH_tables_FK FOREIGN KEY (tables_id) REFERENCES LCDH_tables(tables_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LCDH_card
#------------------------------------------------------------

CREATE TABLE LCDH_card(
        card_id   Int  Auto_increment  NOT NULL ,
        card_name Varchar (50) NOT NULL
	,CONSTRAINT LCDH_card_PK PRIMARY KEY (card_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LCDH_categories
#------------------------------------------------------------

CREATE TABLE LCDH_categories(
        categories_id   Int  Auto_increment  NOT NULL ,
        categories_name Varchar (50) NOT NULL
	,CONSTRAINT LCDH_categories_PK PRIMARY KEY (categories_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LCDH_subCategories
#------------------------------------------------------------

CREATE TABLE LCDH_subCategories(
        subCategories_id   Int  Auto_increment  NOT NULL ,
        subCategories_name Varchar (50) NOT NULL
	,CONSTRAINT LCDH_subCategories_PK PRIMARY KEY (subCategories_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LCDH_dishes
#------------------------------------------------------------

CREATE TABLE LCDH_dishes(
        dishes_id          Int  Auto_increment  NOT NULL ,
        dishes_name        Varchar (50) NOT NULL ,
        dishes_description Text NOT NULL ,
        dishes_price       Varchar (50) NOT NULL ,
        categories_id      Int NOT NULL ,
        subCategories_id   Int NOT NULL
	,CONSTRAINT LCDH_dishes_PK PRIMARY KEY (dishes_id)

	,CONSTRAINT LCDH_dishes_LCDH_categories_FK FOREIGN KEY (categories_id) REFERENCES LCDH_categories(categories_id)
	,CONSTRAINT LCDH_dishes_LCDH_subCategories0_FK FOREIGN KEY (subCategories_id) REFERENCES LCDH_subCategories(subCategories_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LCDH_customers
#------------------------------------------------------------

CREATE TABLE LCDH_customers(
        customers_id        Int  Auto_increment  NOT NULL ,
        customers_lastname  Varchar (50) NOT NULL ,
        customers_firstname Varchar (50) NOT NULL ,
        customers_mail      Varchar (50) NOT NULL ,
        customers_phone     Varchar (50) NOT NULL ,
        customers_readyHour Date NOT NULL
	,CONSTRAINT LCDH_customers_PK PRIMARY KEY (customers_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LCDH_dishesToCard
#------------------------------------------------------------

CREATE TABLE LCDH_dishesToCard(
        dishes_id Int NOT NULL ,
        card_id   Int NOT NULL
	,CONSTRAINT LCDH_dishesToCard_PK PRIMARY KEY (dishes_id,card_id)

	,CONSTRAINT LCDH_dishesToCard_LCDH_dishes_FK FOREIGN KEY (dishes_id) REFERENCES LCDH_dishes(dishes_id)
	,CONSTRAINT LCDH_dishesToCard_LCDH_card0_FK FOREIGN KEY (card_id) REFERENCES LCDH_card(card_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LCDH_customersToDishes
#------------------------------------------------------------

CREATE TABLE LCDH_customersToDishes(
        customers_id               Int NOT NULL ,
        dishes_id                  Int NOT NULL ,
        customersToDishes_quantity TinyINT NOT NULL
	,CONSTRAINT LCDH_customersToDishes_PK PRIMARY KEY (customers_id,dishes_id)

	,CONSTRAINT LCDH_customersToDishes_LCDH_customers_FK FOREIGN KEY (customers_id) REFERENCES LCDH_customers(customers_id)
	,CONSTRAINT LCDH_customersToDishes_LCDH_dishes0_FK FOREIGN KEY (dishes_id) REFERENCES LCDH_dishes(dishes_id)
)ENGINE=InnoDB;

