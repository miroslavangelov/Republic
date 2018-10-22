import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { User } from '../models/user.model';

@Injectable()
export class UserService {

  private readonly URL = 'http://republic/users/';

  constructor(
    protected httpClient: HttpClient,
  ) {}

  /**
   * @returns Observable<User>
   */
  public getTopViewers(): Observable<Array<User>> {
    return this.httpClient.get<Array<User>>(`${this.URL}top-viewers`);
  }
}
