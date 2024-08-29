import { Component } from '@angular/core';
import {MatGridListModule} from '@angular/material/grid-list';
import {MatDividerModule} from '@angular/material/divider';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [MatGridListModule,MatDividerModule],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {
  imageUrl="/assets/images/lqc1.jpg";

  imagelst=[
    "/assets/images/lqc10.jpeg",
    "/assets/images/lqc11.jpeg",
    "/assets/images/lqc12.jpeg",
    "/assets/images/lqc13.jpeg",
    "/assets/images/lqc14.jpeg",
    "/assets/images/lqc15.jpeg",
    "/assets/images/lqc16.jpeg",
    "/assets/images/lqc17.jpeg",
    "/assets/images/lqc18.jpeg",
    "/assets/images/lqc19.jpeg",
    "/assets/images/lqc21.jpeg",
    "/assets/images/lqc22.jpeg",
    "/assets/images/lqc23.jpeg",
    "/assets/images/lqc24.jpeg",
    "/assets/images/lqc25.jpeg",
    "/assets/images/lqc26.jpeg",
    "/assets/images/lqc27.jpeg",
    "/assets/images/lqc28.jpeg",
    "/assets/images/lqc19.jpeg"    
  ]
}
