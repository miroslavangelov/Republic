import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Viewer } from '../models/viewer.model';

@Injectable()
export class ViewerService {

  private readonly URL = 'http://republic/viewers/';

  constructor(
    protected httpClient: HttpClient,
  ) {}

  /**
   * @returns Observable<number>
   */
  public getCount(): Observable<number> {
    return this.httpClient.get<number>(`${this.URL}count`);
  }

  /**
   * @returns Observable<number>
   */
  public getUniqueViewers(): Observable<number> {
    return this.httpClient.get<number>(`${this.URL}unique-viewers`);
  }

  /**
   * @returns Observable<Viewer>
   */
  public getBrowsers(): Observable<Array<Viewer>> {
    return this.httpClient.get<Array<Viewer>>(`${this.URL}browsers`);
  }
}
