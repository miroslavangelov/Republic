import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Session } from '../models/session.model';

@Injectable()
export class SessionService {

  private readonly URL = 'http://republic/sessions/';

  constructor(
    protected httpClient: HttpClient,
  ) {}

  /**
   * @returns Observable<Session>
   */
  public getMostPopular(): Observable<Array<Session>> {
    return this.httpClient.get<Array<Session>>(`${this.URL}most-popular`);
  }
}
