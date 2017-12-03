CREATE TABLE users (
        id_user INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
        username varchar,
        email varchar,
        password varchar,
        dateofbirth date,
        state INTEGER,
        n_lists int
);

CREATE TABLE lists (
        id_list INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
        id_user integer REFERENCES users,
        name varchar,
        dateofcreation date,
        duedate date,
        color varchar,
        category varchar
);

CREATE TABLE lines (
        id_list INTEGER REFERENCES lists,
        id_line INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
        done INTEGER,
        color varchar,
        contents text
);
