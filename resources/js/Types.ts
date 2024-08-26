export type LoginLogModel = {
	active: boolean;
	created_at: string;
	device: string;
	id: number;
	ip_addresses: string | string[];
	session_id: string;
	updated_at: string;
	user_id: number;
	user: UserModel;
};

export type SessionModel = {
	device: string;
	id: string;
	ip_address: string;
	is_current_device: boolean;
	last_activity: string;
	payload: string;
	user_agent: string;
};

export type UserHasFavoriteType = {
	created_at: string;
	id: number;
	model_id: number;
	model_type: string;
	updated_at: string;
	user_id: number;
	user: UserModel;
};

export type UserModel = {
	active: boolean;
	birth_country: string;
	birthdate: string;
	birthplace: string;
	created_at: string;
	email_verified_at: string;
	email: string;
	first_name: string;
	full_name: string;
	id: number;
	last_name: string;
	password: string;
	remember_token: string;
	two_factor_recovery_codes: string;
	two_factor_secret: string;
	updated_at: string;
	username: string;
};
