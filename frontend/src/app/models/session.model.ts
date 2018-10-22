/**
 * Session - Entity class
 */
export class Session {
  public id: number;
  public vem: number;
  public in_frame: number;
  public viewer_window_action: number;
  public viewer_button_status: number;
  public question_option: number;
  public presenter_id: number;
  public cme_accr: number;
  public minutes: number;
  public created_by_id: number;
  public updated_by_id: number;
  public subject: string;
  public tags: string;
  public status: string;
  public title: string;
  public description: string;
  public mediasite_url: string;
  public ios_url: string;
  public external_url: string;
  public custom_info_message: string;
  public speaker_q_and_a_names: string;
  public course: string;
  public coursename: string;
  public author: string;
  public points: string;
  public thumbnail: string;
  public datetime: string;
  public created_at: string;
  public dupdated_at: string;
  public sessionViews: number;
}
