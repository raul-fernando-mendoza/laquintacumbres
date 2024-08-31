import { Component } from '@angular/core';
import {MatGridListModule} from '@angular/material/grid-list';
import {MatDividerModule} from '@angular/material/divider';
import {GalleryModule, GalleryItem, ImageItem } from 'ng-gallery';
import { map, Observable, shareReplay } from 'rxjs';
import { BreakpointObserver, Breakpoints } from '@angular/cdk/layout';
import { CommonModule } from '@angular/common';
import {MatToolbarModule} from '@angular/material/toolbar';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [CommonModule, MatGridListModule,MatDividerModule,GalleryModule,MatToolbarModule],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {

  isHandset$: Observable<boolean> = this.breakpointObserver.observe(Breakpoints.Handset)
  .pipe(
    map(result => result.matches),
    shareReplay()
  );


  images: GalleryItem[] = [
    new ImageItem({src: "/assets/images/lqc1.jpg", thumb: "/assets/images/lqc1.jpg"}),
    new ImageItem({src: "/assets/images/lqc2.jpg", thumb: "/assets/images/lqc2.jpg"}),
    new ImageItem({src: "/assets/images/lqc3.jpg", thumb: "/assets/images/lqc3.jpg"}),
    new ImageItem({src: "/assets/images/lqc4.jpg", thumb: "/assets/images/lqc4.jpg"}),
    new ImageItem({src: "/assets/images/lqc5.jpg", thumb: "/assets/images/lqc5.jpg"}),
    new ImageItem({src: "/assets/images/lqc6.jpg", thumb: "/assets/images/lqc6.jpg"}),
    new ImageItem({src: "/assets/images/lqc7.jpg", thumb: "/assets/images/lqc7.jpg"}),
    new ImageItem({src: "/assets/images/lqc8.jpg", thumb: "/assets/images/lqc8.jpg"}),
    new ImageItem({src: "/assets/images/lqc9.jpg", thumb: "/assets/images/lqc9.jpg"}),
    new ImageItem({src: "/assets/images/lqc10.jpg", thumb: "/assets/images/lqc10.jpg"}),
    new ImageItem({src: "/assets/images/lqc11.jpg", thumb: "/assets/images/lqc11.jpg"}),
    new ImageItem({src: "/assets/images/lqc12.jpg", thumb: "/assets/images/lqc12.jpg"}),
    new ImageItem({src: "/assets/images/lqc13.jpg", thumb: "/assets/images/lqc13.jpg"}),
    new ImageItem({src: "/assets/images/lqc14.jpg", thumb: "/assets/images/lqc14.jpg"}),
    new ImageItem({src: "/assets/images/lqc15.jpg", thumb: "/assets/images/lqc15.jpg"})
  ]

  constructor(private breakpointObserver: BreakpointObserver){

  }
}
