import { TaskStatus } from "./TaskStatus";

export interface Task {
    id: number;
    user_id: number;
    team_id: number | null;
    title: string;
    description: string;
    status_id: number;
    status?: TaskStatus;
    due_date: Date | null;
    created_at: Date;
    updated_at: Date;
}
