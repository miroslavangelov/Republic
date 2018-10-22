import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { SessionService } from './services/session.service';
import { HttpClientModule } from '@angular/common/http';
import { ViewerService } from './services/viewer.service';
import { UserService } from './services/user.service';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
  ],
  providers: [
    SessionService,
    ViewerService,
    UserService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
