import { Component } from '@angular/core';
import {MatGridListModule} from '@angular/material/grid-list';
import {MatDividerModule} from '@angular/material/divider';
import {GalleryModule, GalleryItem, ImageItem } from 'ng-gallery';
import { map, Observable, shareReplay } from 'rxjs';
import { BreakpointObserver, Breakpoints } from '@angular/cdk/layout';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [CommonModule, MatGridListModule,MatDividerModule,GalleryModule],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {

  isHandset$: Observable<boolean> = this.breakpointObserver.observe(Breakpoints.Handset)
  .pipe(
    map(result => result.matches),
    shareReplay()
  );

  imageUrl="/assets/images/lqc1.jpg";

  images: GalleryItem[] = [
    new ImageItem({src: "/assets/images/lqc10.jpeg", thumb: "/assets/images/lqc10.jpeg"}),
    new ImageItem({src: "/assets/images/lqc11.jpeg", thumb: "/assets/images/lqc11.jpeg"}),
    new ImageItem({src: "/assets/images/lqc12.jpeg", thumb: "/assets/images/lqc12.jpeg"}),
    new ImageItem({src: "/assets/images/lqc13.jpeg", thumb: "/assets/images/lqc13.jpeg"}),
    new ImageItem({src: "/assets/images/lqc14.jpeg", thumb: "/assets/images/lqc14.jpeg"}),
    new ImageItem({src: "/assets/images/lqc15.jpeg", thumb: "/assets/images/lqc15.jpeg"}),
    new ImageItem({src: "/assets/images/lqc16.jpeg", thumb: "/assets/images/lqc16.jpeg"}),
    new ImageItem({src: "/assets/images/lqc17.jpeg", thumb: "/assets/images/lqc17.jpeg"}),
    new ImageItem({src: "/assets/images/lqc18.jpeg", thumb: "/assets/images/lqc18.jpeg"}),
    new ImageItem({src: "/assets/images/lqc19.jpeg", thumb: "/assets/images/lqc19.jpeg"}),
    new ImageItem({src: "/assets/images/lqc20.jpeg", thumb: "/assets/images/lqc20.jpeg"}),
    new ImageItem({src: "/assets/images/lqc21.jpeg", thumb: "/assets/images/lqc21.jpeg"}),
    new ImageItem({src: "/assets/images/lqc22.jpeg", thumb: "/assets/images/lqc22.jpeg"}),
    new ImageItem({src: "/assets/images/lqc23.jpeg", thumb: "/assets/images/lqc23.jpeg"}),
    new ImageItem({src: "/assets/images/lqc24.jpeg", thumb: "/assets/images/lqc24.jpeg"}),
    new ImageItem({src: "/assets/images/lqc25.jpeg", thumb: "/assets/images/lqc25.jpeg"}),
    new ImageItem({src: "/assets/images/lqc26.jpeg", thumb: "/assets/images/lqc26.jpeg"}),
    new ImageItem({src: "/assets/images/lqc27.jpeg", thumb: "/assets/images/lqc27.jpeg"}),
    new ImageItem({src: "/assets/images/lqc28.jpeg", thumb: "/assets/images/lqc28.jpeg"})
  ]

  constructor(private breakpointObserver: BreakpointObserver){

  }
}
