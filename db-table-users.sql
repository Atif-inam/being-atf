CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `token` varchar(40) NOT NULL
) 
