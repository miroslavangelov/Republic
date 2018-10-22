import { Component, OnInit } from '@angular/core';
import { SessionService } from './services/session.service';
import { Session } from './models/session.model';
import { ViewerService } from './services/viewer.service';
import { UserService } from './services/user.service';
import { User } from './models/user.model';
import { Viewer } from './models/viewer.model';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  private mostPopularSessions: Array<Session> = [];
  private topViewers: Array<User> = [];
  private viewersCount = 0;
  private uniqueViewersCount = 0;
  private browsers: Array<Viewer> = [];

  /**
   * @param sessionService
   * @param userService
   * @param viewerService
   */
  public constructor(
    private sessionService: SessionService,
    private userService: UserService,
    private viewerService: ViewerService
  ) {
  }

  /**
   * @inheritDoc
   */
  public ngOnInit(): void {
    this.getMostPopularSessions();
    this.getTopViewers();
    this.getViewersCount();
    this.getUniqueViewers();
    this.getBrowsers();
  }

  private getMostPopularSessions(): void {
    this.sessionService.getMostPopular()
      .subscribe(
        (sessions: Array<Session>) => {
          this.mostPopularSessions = sessions;
        },
        (error => console.log(error))
      );
  }

  private getTopViewers(): void {
    this.userService.getTopViewers()
      .subscribe(
        (users: Array<User>) => {
          this.topViewers = users;
        },
        (error => console.log(error))
      );
  }

  private getViewersCount(): void {
    this.viewerService.getCount()
      .subscribe(
        (viewersCount: number) => {
          this.viewersCount = viewersCount;
        },
        (error => console.log(error))
      );
  }

  private getUniqueViewers(): void {
    this.viewerService.getUniqueViewers()
      .subscribe(
        (uniqueViewersCount: number) => {
          this.uniqueViewersCount = uniqueViewersCount;
        },
        (error => console.log(error))
      );
  }

  private getBrowsers(): void {
    this.viewerService.getBrowsers()
      .subscribe(
        (browsers: Array<Viewer>) => {
          this.browsers = browsers;
        },
        (error => console.log(error))
      );
  }
}
