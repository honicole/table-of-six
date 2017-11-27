SELECT * FROM eventreg WHERE user1 IN
	(SELECT userID FROM users WHERE userName="joyce")