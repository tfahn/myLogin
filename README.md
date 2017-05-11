```sql
CREATE TABLE users ( `user` VARCHAR(255) NOT NULL , `pw_hash` VARCHAR(255) NOT NULL ) ENGINE = InnoDB;

INSERT INTO users (`user`, `pw_hash`) VALUES ('user', '$2y$10$4b.HEihcOIOkaWSrr8P/UeSQsKvBGDqHBiuIB7AezgbATVqkZ/HLC');
INSERT INTO users (`user`, `pw_hash`) VALUES ('test', '$2y$10$R26LvhVF4y68sak69p2qVeWjh1e.ybDV0WQ7HpgFhS8WhjfdeSzze');
```