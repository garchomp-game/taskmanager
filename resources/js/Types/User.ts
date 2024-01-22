export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: Date | null;
    password: string; // 実際のアプリケーションでは通常フロントエンドには表示しません
    two_factor_secret: string | null;
    two_factor_recovery_codes: string | null;
    two_factor_confirmed_at: Date | null;
    remember_token: string | null;
    current_team_id: number | null;
    profile_photo_path: string | null;
    created_at: Date;
    updated_at: Date;
}
